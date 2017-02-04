<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upliu.net> https://upliu.net/
 * Date: 11/01/2017
 * Time: 01:18
 */

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%relation}}".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $from
 * @property integer $target
 * @property integer $created_at
 */
class Relation extends ActiveRecord
{
    const TYPE_FOLLOW_USER = 1;
    const TYPE_FOLLOW_QUESTION = 2;
    const TYPE_FOLLOW_ANSWER = 3;
    const TYPE_FOLLOW_TOPIC = 4;
    const TYPE_MARK_QUESTION = 5;
    const TYPE_APPROVE_ANSWER = 6;
    const TYPE_OPPOSE_ANSWER = 7;
    const TYPE_APPROVE_QUESTION = 8;
    const TYPE_OPPOSE_QUESTION = 9;
    const TYPE_APPROVE_COMMENT = 10;

    public static function tableName()
    {
        return '{{%relation}}';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ]
        ];
    }

    /**
     * 关注的用户ID
     * @param $userId
     * @return array
     */
    public static function getFollowedUserIds($userId)
    {
        return static::find()
            ->where([
                'type' => self::TYPE_FOLLOW_USER,
                'from' => $userId,
            ])
            ->select('target')
            ->column();
    }

    /**
     * 关注的问题ID
     * @param $userId
     * @return array
     */
    public static function getFollowedQuestionIds($userId)
    {
        return static::find()
            ->where([
                'type' => self::TYPE_FOLLOW_QUESTION,
                'from' => $userId,
            ])
            ->orderBy('id desc')
            ->limit(1000) // 最近关注的 1000 个问题
            ->select('target')
            ->column();
    }

    /**
     * 关注的话题的 ID
     * @param $userId
     * @return array
     */
    public static function getQuestionIdsOfFollowedTopic($userId)
    {
        $topicIds = static::find()
            ->where([
                'type' => self::TYPE_FOLLOW_TOPIC,
                'from' => $userId,
            ])
            ->select('target')
            ->column();

        $questionIds = QuestionTopic::find()
            ->where([
                'topic_id' => $topicIds
            ])
            ->orderBy('id desc')
            ->limit(1000) // 最近添加话题的 1000 个问题
            ->select('question_id')
            ->column();

        return $questionIds;
    }
}