<?php
use app\models\Answer;
use app\models\Question;
use yii\helpers\Html;
use app\widgets\VoteWidget;
use app\widgets\CommentWidget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var Answer $model */
/* @var string $key */

?>
<div id="answer-<?= $model->id ?>" class="post" data-model="answer" data-id="<?= $model->id ?>">
    <div class="vote-wrap">
        <?= VoteWidget::widget([
            'model' => $model,
        ]) ?>
    </div>

    <div class="offset">
        <div class="body">
            <?= $model->body ?>
        </div>

        <div class="meta row">
            <div class="col-md-8 col-sm-8 col-xs-10">
            <span><?= Yii::$app->formatter->asRelativeTime($model->created_at) ?><?= Yii::t('app', '回答') ?></span>
            <span><a class="comment-count cmd-toggle-comment" href="javascript:;"><?= $model->count_comment > 0 ? $model->count_comment . ' ' : '' ?><?= Yii::t('app', '评论') ?></a></span>
                <?php if (!empty($myAnswer) && $myAnswer->id == $model->id) : ?>
            <span><a href class="cmd-edit-answer" data-toggle="modal" data-target="#answer-editor-box">编辑</a></span>
                <?php endif; ?>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 author-avatar">
                <?= Html::a(Html::img($model->author->avatar), $model->author->getHomePageLink(), ['class' => 'mr10 avatar avatar-32']) ?>
            </div>
            <div class="col-md-2 col-sm-2 hidden-xs author-info">
                <div class="author-info-wrap">
                    <?= Html::a($model->author->display_name, $model->author->getHomePageLink(), ['class' => 'name']) ?>
                    <div class="reputation"><?= $model->author->reputation ?> <?= Yii::t('app', '声望') ?></div>
                </div>
            </div>
        </div>
        <?= CommentWidget::widget(['model' => $model]) ?>
    </div>
    <?php $user = Yii::$app->user->identity; ?>
</div>
