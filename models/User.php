<?php
namespace app\models;
use yii\base\UnknownPropertyException;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * User
 * @property UserProfile $profile
 *
 * @property string $display_name
 *
 */
class User extends \dektrium\user\models\User
{
    public function getProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id'])->inverseOf('user');
    }

    public static function findBySlug($slug)
    {
        return UserProfile::findOne(['slug' => $slug])->user;
    }

    public function getIsMan()
    {
        return $this->profile->gender == 1;
    }

    public function getIsWoman()
    {
        return $this->profile->gender == 2;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            $profile = new UserProfile();
            $profile->setAttribute('display_name', $this->username);
            $profile->setAttribute('slug', $this->username);
            $profile->link('user', $this);
        }
    }

    public function getHomePageLink()
    {
        return Url::to(['/people/view', 'slug' => $this->profile->slug]);
    }


    public function getAvatarHtml($cls = 'avatar avatar-32')
    {
        return Html::a(Html::img($this->profile->avatar), $this->getHomePageLink(), ['class' => $cls]);
    }

    public function __get($name)
    {
        try {
            return parent::__get($name);
        } catch (UnknownPropertyException $e) {
            return $this->profile->{$name};
        }
    }
}
