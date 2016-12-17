<?php

namespace app\models;

use app\behaviors\UuidBehavior;
use app\models\traits\VoteTrait;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property string $uuid
 * @property string $puuid
 * @property string $body
 * @property integer $created_at
 * @property integer $author_id
 * @property integer $reply_author_id
 * @property integer $reply_comment_id
 * @property integer $count_vote_up
 * @property string $comment_type
 *
 * @property User $author
 * @property User $replyAuthor
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
            [['body', 'comment_type'], 'required'],
            [['created_at', 'author_id', 'reply_author_id', 'reply_comment_id', 'count_vote_up'], 'integer'],
            [['uuid', 'puuid'], 'string', 'max' => 36],
            [['comment_type'], 'string', 'max' => 32],

            ['body', function($attr){
                // 验证是否离上一次评论时间相差 15 秒
                $lastTime = self::find()->select('created_at')->orderBy('id desc')->asArray()->limit(1)->scalar();
                // @todo 15 秒做成后台可配置选项
                $sec = 15;
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
            'id' => 'ID',
            'uuid' => 'Uuid',
            'puuid' => 'Puuid',
            'body' => \Yii::t('app', '评论内容'),
            'created_at' => 'Created At',
            'author_id' => 'Author ID',
            'reply_author_id' => 'Reply Author ID',
            'reply_comment_id' => 'Reply Comment ID',
            'count_vote_up' => 'Count Vote Up',
            'comment_type' => 'Comment Type',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->author_id = \Yii::$app->user->id;
                \Yii::trace($this->author_id);
                $this->created_at = time();
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

    public function behaviors()
    {
        return [
            UuidBehavior::className(),
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete();
        VoteLog::deleteAll(['uuid' => $this->uuid]);
        // 删除问题或回答的评论数
        if ($this->comment_type == self::COMMENT_TYPE_QUESTION) {
            Question::updateAllCounters(['count_comment' => -1], ['uuid' => $this->puuid]);
        } else {
            Answer::updateAllCounters(['count_comment' => -1], ['uuid' => $this->puuid]);
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            // 增加问题或回答的评论数
            if ($this->comment_type == self::COMMENT_TYPE_QUESTION) {
                Question::updateAllCounters(['count_comment' => 1], ['uuid' => $this->puuid]);
            } else {
                Answer::updateAllCounters(['count_comment' => 1], ['uuid' => $this->puuid]);
            }
        }
    }

    protected $_questionId;
    public function getQuestionId()
    {
        if ($this->_questionId === null) {
            if ($this->comment_type == self::COMMENT_TYPE_QUESTION) {
                $this->_questionId = Question::find()->select('id')->where(['uuid' => $this->puuid])->scalar();
            } else if ($this->comment_type == self::COMMENT_TYPE_ANSWER) {
                $this->_questionId = Answer::find()->select('question_id')->where(['uuid' => $this->puuid])->scalar();
            }
        }
        return $this->_questionId;
    }
}
