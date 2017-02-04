<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upliu.net> https://upliu.net/
 * Date: 23/01/2017
 * Time: 22:53
 */

namespace models;


use yii\db\ActiveRecord;

/**
 * 通知
 * Class Notification
 * @package models
 */
class Notification extends ActiveRecord
{

    const TYPE_MM = 1; // 私信
    const TYPE_NEW_ANSWER = 2; // 问题有新回答
    const TYPE_QUESTION_COMMENT = 3; // 问题被评论
    const TYPE_ANSWER_COMMENT = 4; // 回答被评论
    const TYPE_COMMENT_REPLY = 5; // 评论被回复
    const TYPE_AT_IN_QUESTION = 6; // 在问题中被 @
    const TYPE_AT_IN_ANSWER = 7; // 在回答中被 @

    public static function tableName()
    {
        return '{{%notification}}';
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
}