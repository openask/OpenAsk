<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_meta}}".
 *
 * @property integer $user_id
 * @property integer $last_read_feed
 * @property integer $count_approve
 * @property integer $count_thank
 * @property integer $count_ask
 * @property integer $count_answer
 * @property integer $count_mark
 * @property string $avatar
 * @property integer $gender
 * @property string $headline
 * @property string $bio
 * @property string $business
 * @property string $location
 * @property string $display_name
 * @property string $slug
 * @property integer $reputation
 *
 * @property User $user
 */
class UserMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_meta}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'display_name'], 'required'],
            [['user_id', 'last_read_feed', 'count_approve', 'count_thank', 'count_ask', 'count_answer', 'count_mark', 'gender', 'reputation'], 'integer'],
            [['bio'], 'string'],
            [['avatar'], 'string', 'max' => 256],
            [['headline', 'business', 'location', 'display_name', 'slug'], 'string', 'max' => 128],
            [['slug'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'last_read_feed' => 'Last Read Feed',
            'count_approve' => 'Count Vote Up',
            'count_thank' => 'Count Thank',
            'count_ask' => 'Count Ask',
            'count_answer' => 'Count Answer',
            'count_mark' => 'Count Mark',
            'avatar' => 'Avatar',
            'gender' => 'Gender',
            'headline' => 'Headline',
            'bio' => 'Bio',
            'business' => 'Business',
            'location' => 'Location',
            'display_name' => 'Display Name',
            'slug' => 'Slug',
            'reputation' => 'Reputation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
