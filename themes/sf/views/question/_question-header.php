<?php

use yii\helpers\Html;

/* @var $question app\models\Question */
?>
<div class="post-header" data-id="<?= $question->id ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 coll-xs-12">
                <div class="info">
                    <h3><?= $question->title ?></h3>
                    <ul class="tag-list">
                        <?php foreach ($question->topics as $topic) : ?>
                            <li><?= Html::a($topic->name, $topic->getUrl()) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?= Html::a($question->author->display_name, ['/people/view', 'slug' => $question->author->slug], ['class' => 'author']) ?>
                    <?= Yii::$app->formatter->asRelativeTime($question->last_active) ?><?= Yii::t('app', '提问') ?>
                    ·
                    <?= Html::a(Yii::t('app', '编辑'), ['question/update', 'id' => $question->id]) ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 hidden-xs">
                <div>
                    <button class="btn btn-success btn-sm mr15 op cmd-follow-question"><?= $question->follow ? Yii::t('app', '已关注') :  Yii::t('app', '关注') ?></button>
                    <strong class="count"><?= $question->count_follow ?></strong> <?= Yii::t('app', '关注') ?>
                </div>
                <div class="mt10">
                    <button class="btn btn-default btn-sm mr15 op cmd-mark-question"><?= $question->mark ? Yii::t('app', '已收藏') :  Yii::t('app', '收藏') ?></button>
                    <strong class="count"><?= $question->count_mark ?></strong> <?= Yii::t('app', '收藏') ?>，
                    <strong><?= $question->count_view ?></strong> <?= Yii::t('app', '浏览') ?>
                </div>
            </div>
        </div>
    </div>
</div>
