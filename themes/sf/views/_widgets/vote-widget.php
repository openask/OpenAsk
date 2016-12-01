<?php
use kartik\icons\Icon;

/** @var $model */
?>

<div class="widget widget-vote <?= $model->isVotedUp ? 'voted-up' : '' ?> <?= $model->isVotedDown ? 'voted-down' : '' ?> <?= $model->author_id == \Yii::$app->user->id ? 'disabled' : '' ?>">
    <div class="asc"><?= Icon::show('sort-asc') ?></div>
    <div class="desc"><?= Icon::show('sort-desc') ?></div>
    <div class="count"><?= $model->count_vote_up ?></div>
</div>
