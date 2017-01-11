<?php
use kartik\icons\Icon;

/** @var $model */

\app\themes\sf\ThemeAsset::registerJsFile('vote-widget.js', $this);
?>

<div class="widget widget-vote <?= $model->isVotedUp ? 'voted-up' : '' ?> <?= $model->isVotedDown ? 'voted-down' : '' ?> <?= $model->author_id == \Yii::$app->user->id ? 'disabled' : '' ?>">
    <div class="asc"><?= Icon::show('sort-asc') ?></div>
    <div class="desc"><?= Icon::show('sort-desc') ?></div>
    <div class="count"><?= $model->count_approve ?></div>
</div>
