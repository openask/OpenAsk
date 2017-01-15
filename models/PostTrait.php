<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\HtmlPurifier;

/**
 * Class PostTrait
 * @package app\models
 *
 * @property User $author
 */
trait PostTrait
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id'])->with('profile');
    }

    public function sanitize($html)
    {
        return HtmlPurifier::process($html);
    }

}
