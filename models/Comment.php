<?php

namespace app\models;

use app\helpers\Helper;
use app\models\traits\VoteTrait;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property string $body
 * @property integer $created_at
 * @property integer $author_id
 * @property integer $reply_author_id
 * @property integer $reply_comment_id
 * @property integer $count_approve
 * @property integer $question_id
 * @property integer $answer_id
 *
 * @property User $author
 * @property User $replyAuthor
 * @property Question $question
 * @property Answer $answer
 */
class Comment extends \yii\db\ActiveRecord
{
    use VoteTrait;

    const COMMENT_TYPE_QUESTION = 'question';
    const COMMENT_TYPE_ANSWER = 'answer';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['body'], 'filter', 'filter' => 'trim'],
            [['body'], 'required'],
            [['created_at', 'author_id', 'reply_author_id', 'reply_comment_id', 'count_approve'], 'integer'],

            ['body', function($attr){
                // 验证是否离上一次评论时间相差 15 秒
                $lastTime = self::find()->select('created_at')->orderBy('id desc')->asArray()->limit(1)->scalar();
                $sec = Helper::getOpenAskConfig('comment_interval');
                if ($lastTime && $lastTime > time() - $sec) {
                    $this->addError($attr, \Yii::t('app', '评论间隔不得少于{sec}秒', ['sec' => $sec]));
                }
            }]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'body' => \Yii::t('app', '评论内容'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->author_id = \Yii::$app->user->id;
                if ($this->reply_comment_id) {
                    $this->reply_author_id = Comment::find()->select('author_id')->where(['id' => $this->reply_comment_id])->scalar();
                }
            }
            return true;
        }
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function getReplyAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'reply_author_id']);
    }

    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    public function getAnswer()
    {
        return $this->hasOne(Answer::className(), ['id' => 'answer_id']);
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete();
        VoteLog::deleteAll(['uuid' => $this->uuid]);
        // 删除问题或回答的评论数
        if ($this->answer_id) {
            $this->answer->updateCounters(['count_comment' => -1]);
        } else if ($this->question_id) {
            $this->question->updateCounters(['count_comment' => -1]);
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            // 增加问题或回答的评论数
            if ($this->answer_id) {
                $this->answer->updateCounters(['count_comment' => 1]);
            } else if ($this->question_id) {
                $this->question->updateCounters(['count_comment' => 1]);
            }
        }
    }

}
