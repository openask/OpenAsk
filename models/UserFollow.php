<?php


namespace app\models;


use yii\db\ActiveRecord;
use yii\db\IntegrityException;

class UserFollow extends ActiveRecord
{
    const AtoB = 0b01; // A 关注 B
    const BtoA = 0b10; // B 关注 A
    const AnoB = 0b00; // A B 互相没有关注
    const AeachB = 0b11; // A B 互相关注

    /**
     * 获取关注的人
     * @param $uid
     * @return array
     */
    public static function getFollows($uid)
    {
        return static::getBsByA($uid);
    }

    public static function getFollowsQuery($uid)
    {
        return static::find()->select('uid')->where(['fans_id' => $uid]);
    }

    public static function hasFollowed($a, $b)
    {
        return static::exists($a, $b);
    }

    public static function follow($a, $b)
    {
        try {
            return static::addOne($a, $b);
        } catch (IntegrityException $e) {
            return null;
        }
    }

    /**
     * $a 和 $b 之间的关系
     * @param $a
     * @param $b
     * @return int
     */
    public static function relation($a, $b)
    {
        if ($a == 0 || $b == 0) {
            return 0b00;
        }
        $v1 = static::exists($a, $b) ? 0b01 : 0b00;
        $v2 = static::exists($b, $a) ? 0b10 : 0b00;

        return $v1 | $v2;
    }


    protected static $cachedResults;

    public static function setCachedResults($a, $b, $exits = true)
    {
        $k = "$a-$b";
        static::$cachedResults[$k] = (bool)$exits;
    }

    public static function addOne($a, $b, $t=null)
    {
        $o = new static([
            'a' => $a,
            'b' => $b,
        ]);
        if ($o->hasAttribute('t') || $o->hasProperty('t')) {
            if ($t === null) {
                $t = time();
            }
            $o->t = $t;
        }
        $o->save(false);
        static::setCachedResults($a, $b);
        return $o;
    }

    public static function deleteOne($a, $b)
    {
        static::setCachedResults($a, $b, false);
        return static::deleteAll(['a' => $a, 'b' => $b]);
    }
    /**
     * $a 是否关注了 $b
     * @param $a
     * @param $b
     * @return bool
     */
    public static function exists($a, $b)
    {
        $k = "$a-$b";
        if (!isset(static::$cachedResults[$k])) {
            static::$cachedResults[$k] = static::find()->where([
                'a' => $a,
                'b' => $b
            ])->exists();
        }

        return static::$cachedResults[$k];
    }
}