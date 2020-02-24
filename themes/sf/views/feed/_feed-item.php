<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upliu.net>
 * Date: 22/12/2016
 * Time: 11:46
 */

/** @var \app\models\Feed $feed */

$profile = $feed->user->profile;
?>

<div class="feed-item media">
    <div class="pull-left"><?= $feed->user->getAvatarHtml('avatar avatar-40') ?></div>
    <div class="media-body">
        <span class="text-muted"><?= $profile->display_name ?> <?= $feed->getTypeDesc() ?> · <?= Yii::$app->formatter->asRelativeTime($feed->created_at) ?></span>
        <div><?= $feed->question->title ?></div>
    </div>
</div>
