<?php

namespace app\helpers;

use app\models\Map;
use app\models\UserFollow;
use app\models\User;
use kartik\icons\Icon;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Yii;
use yii\helpers\Url;

class Helper
{

    public static function getOpenAskConfig($key)
    {
        return ArrayHelper::getValue(Yii::$app->params['openask'], $key);
    }

    public static function outputJson()
    {
        Yii::$app->response->format = 'json';
    }

    public function numberHumanized($number)
    {
        $k = intval($number / 1000);
        return "{$k}K";
    }

    public static function summary($html, $length, &$result)
    {
        $txt = strip_tags($html);
        if (mb_strlen($txt, 'UTF-8') <= $length + 3) {
            $result = 0;
        } else {
            $result = 1;
        }
        return mb_substr($txt, 0, $length, 'UTF-8') . '...';
    }

    /**
     * @param $userA int|User
     * @param $userB User
     * @return string
     */
    public static function renderFollowButton($userA, $userB, $options = [])
    {
        $a = is_object($userA) ? $userA->id : $userA;
        $b = $userB->id;
        $rel = UserFollow::relation($a, $b);
        switch ($rel) {
            case Map::A2B: // 我关注了他
                $icon = '';
                $title = '';
                break;
            case Map::B2A: // 他关注了我
                $icon = Icon::show('long-arrow-right');
                $title = Yii::t('app', '对方已关注了你');
                break;
            case Map::AeachB: // 互相关注
                $icon = Icon::show('exchange');
                $title = Yii::t('app', '已互相关注');
                break;
            default: // 彼此没关注
                $icon = '';
                $title = '';
                break;
        }
        if (!empty($icon)) {
            $icon = $icon . ' ';
        }
        if (!($rel & Map::A2B)) { // 没有关注
            $label = Yii::t('app', '关注');
            if ($userB->getIsWoman()) {
                $label = Yii::t('app', '关注她');
            } else if ($userB->getIsMan()) {
                $label = Yii::t('app', '关注他');
            }
            $class = 'i-btn-green';
            $api = '/api/follow-user';
        } else {
            $label = Yii::t('app', '取消关注');
            $class = 'i-btn-disabled';
            $api = '/api/un-follow-user';
        }
        $options['data-slug'] = $userB->slug;
        $options['data-api-url'] = Url::to([$api]);
        if (!empty($title)) {
            $options['title'] = $title;
        }
        Html::addCssClass($options, ['cmd-follow', 'i-btn', $class]);
        return Html::tag('a', $icon . $label, $options);
    }
}


