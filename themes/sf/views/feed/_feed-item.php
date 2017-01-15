<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upliu.net>
 * Date: 22/12/2016
 * Time: 11:46
 */

/** @var \app\models\UserActionHistory $userActionHistory */

$profile = $userActionHistory->author->profile;
?>

<div class="feed-item">
    <div class="avatar"><?= \yii\bootstrap\Html::img($profile->avatar) ?></div>
    <div class="main">
        <div class="text-muted"><?= $profile->display_name ?> <?= $userActionHistory->getTypeDesc() ?> · <?= Yii::$app->formatter->asRelativeTime($userActionHistory->time) ?></div>
    </div>
</div>
