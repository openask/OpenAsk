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
 * @property static $replyComment
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
                // 验证评论间隔时间
                $lastTime = self::find()->select('created_at')->orderBy('id desc')->asArray()->limit(1)->scalar();
                $sec = Helper::getOpenAskConfig('comment_interval');
                if ($lastTime && $lastTime > time() - $sec) {
                    $this->addError($attr, \Yii::t('app', '评论间隔不得少于{sec}秒', ['sec' => $sec]));
                    return;
                }

                // 不能回复自身
                if ($this->reply_comment_id) {
                    if ($this->replyComment->author_id == $this->author_id) {
                        $this->addError($attr, \Yii::t('app', '不能回复自己的评论'));
                        return;
                    }
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
                if ($this->reply_comment_id) {
                    $this->reply_author_id = $this->replyComment->author_id;
                }
            }
            return true;
        }
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * 当前评论所回复的评论
     * @return \yii\db\ActiveQuery
     */
    public function getReplyComment()
    {
        return $this->hasOne(static::className(), ['id' => 'reply_comment_id']);
    }

    /**
     * 当前评论所回复的评论作者
     * @return \yii\db\ActiveQuery
     */
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
        Relation::deleteAll(['target' => $this->id, 'type' => Relation::TYPE_APPROVE_COMMENT]);
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
