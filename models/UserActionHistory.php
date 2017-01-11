<?php
/**
 * Created by IntelliJ IDEA.
 * User: liu
 * Date: 8/25/16
 * Time: 10:14
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\IntegrityException;


/**
 * This is the model class for table "{{%user_action_history}}".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $user_id
 * @property integer $time
 * @property integer $question_id
 * @property integer $answer_id
 */
class UserActionHistory extends ActiveRecord
{
    const TYPE_FOLLOW_QUESTION = 1; // 关注该问题
    const TYPE_CREATE_QUESTION = 2; // 创建该问题
    const TYPE_APPROVE_QUESTION = 3; // 顶问题
    const TYPE_CREATE_ANSWER = 4; // 回答了该问题
    const TYPE_APPROVE_ANSWER = 6; // 顶回答
    const TYPE_FOLLOW_TOPIC = 7; // 关注话题

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_action_history}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'user_id'], 'required'],
            [['type', 'user_id', 'created_at', 'question_id', 'answer_id'], 'integer'],
        ];
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'user_id' => 'User_id',
            'time' => 'Time',
            'question_id' => 'Question ID',
            'answer_id' => 'Answer ID',
        ];
    }

    public function getTypeDesc()
    {
        switch ($this->type) {
            case self::TYPE_FOLLOW_QUESTION:
                return \Yii::t('app', '关注该问题');
            case self::TYPE_CREATE_QUESTION:
                return \Yii::t('app', '添加该问题');
            case self::TYPE_VOTE_UP_ANSWER:
                return \Yii::t('app', '赞同该回答');
            case self::TYPE_CREATE_ANSWER:
                return \Yii::t('app', '回答了该问题');
        }
    }

    public function getAnswer()
    {
        return $this->hasOne(Answer::className(), ['id' => 'answer_id']);
    }

    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getHistoryData()
    {
        return $this->hasOne(UserActionHistoryData::className(), ['history_id' => 'id']);
    }

    public static function add($attr)
    {
        unset($attr['created_at']);
        if (static::find()->where($attr)->exists()) {
            return false;
        }
        return (new static($attr))
            ->save(false);
    }

    /**
     * 回答问题
     * @param int $user_id
     * @param Answer $answer
     */
    public static function createAnswer($user_id, Answer $answer)
    {
        static::add([
            'type' => self::TYPE_CREATE_ANSWER,
            'user_id' => $user_id,
            'answer_id' => $answer->id,
            'question_id' => $answer->question_id,
        ]);
    }


    /**
     * 创建问题
     * @param int $user_id
     * @param Question $question
     */
    public static function createQuestion($user_id, Question $question)
    {
        static::add([
            'type' => self::TYPE_CREATE_QUESTION,
            'user_id' => $user_id,
            'question_id' => $question->id,
        ]);
    }

    /**
     * 关注问题
     * 如果已关注，则取消关注
     * @param int $user_id
     * @param Question $question
     * @param bool $insertHistory 是否插入feed表
     * @param bool $skipOnFollowed 已经关注是否跳过处理
     * @return string
     */
    public static function followQuestion($user_id, $question, $insertHistory = true, $skipOnFollowed = false)
    {
        $relation = [
            'type' => Relation::TYPE_FOLLOW_QUESTION,
            'from' => $user_id,
            'target' => $question->id,
        ];
        $follow = Relation::findOne($relation);
        if ($follow && $skipOnFollowed) {return 'followed';}
        // 已关注
        if ($follow && $follow->delete()) {
            $question->updateCounters(['count_follow' => -1]);
            return 'unfollow';
        } else {
            $follow = new Relation($relation);
            $follow->save();
            if ($insertHistory) {
                static::add([
                    'type' => self::TYPE_FOLLOW_QUESTION,
                    'user_id' => $user_id,
                    'question_id' => $question->id,
                ]);
            }
            $question->updateCounters(['count_follow' => 1]);
            return 'followed';
        }
    }

    /**
     * 收藏问题
     * 如果已收藏，则取消收藏
     * @param int $user_id
     * @param Question $question
     * @return string
     */
    public static function markQuestion($user_id, Question $question)
    {
        $relation = [
            'type' => Relation::TYPE_MARK_QUESTION,
            'from' => $user_id,
            'target' => $question->id,
        ];
        $mark = Relation::findOne($relation);
        // 已关注
        if ($mark && $mark->delete()) {
            $question->updateCounters(['count_mark' => -1]);
            return 'unmark';
        } else {
            $mark = new Relation($relation);
            $mark->save();
            $question->updateCounters(['count_mark' => 1]);
            return 'marked';
        }
    }
}
