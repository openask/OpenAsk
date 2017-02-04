<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upliu.net> https://upliu.net/
 * Date: 23/01/2017
 * Time: 23:06
 */

namespace models;


use yii\db\ActiveRecord;

/**
 * 私信
 * Class Message
 * @package models
 */
class Message extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%message}}';
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