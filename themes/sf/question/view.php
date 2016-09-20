<?php

/* @var $this yii\web\View */
use app\widgets\VoteWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $question app\models\Question */
/* @var $answer app\models\Answer */
/* @var $viewAnswer app\models\Answer */

$this->title = $question->title;
?>

<div class="post-header">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="info">
                    <h3><?= $question->title ?></h3>
                    <ul class="tag-list">
                        <?php foreach ($question->topics as $topic) : ?>
                            <li><?= Html::a($topic->name, $topic->getUrl()) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?= Html::a($question->author->display_name, ['people/view', 'slug' => $question->author->slug], ['class' => 'author']) ?>
                    <?= Yii::$app->formatter->asRelativeTime($question->last_active) ?><?= Yii::t('app', '提问') ?>
                    ·
                    <?= Html::a(Yii::t('app', '编辑'), ['question/update', 'id' => $question->id]) ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 hidden-xs">
                <div>
                    <button class="btn btn-success btn-sm mr15"><?= Yii::t('app', '关注') ?></button>
                    <strong><?= $question->count_interest ?></strong> <?= Yii::t('app', '关注') ?>
                </div>
                <div class="mt10">
                    <button class="btn btn-default btn-sm mr15"><?= Yii::t('app', '收藏') ?></button>
                    <strong><?= $question->count_mark ?></strong> <?= Yii::t('app', '收藏') ?>，
                    <strong><?= $question->count_view ?></strong> <?= Yii::t('app', '浏览') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt30">
<div class="row">
    <div class="col-xs-12 col-md-9 main">

        <div class="question-detail">
            <?= VoteWidget::widget([
                'count' => $question->count_vote_up
            ]) ?>
            <div class="body">
                <?= $question->body_sanitized ?>
            </div>
            <div class="meta">
                <span><?= Yii::$app->formatter->asRelativeTime($question->created_at) ?></span>
                <?php if ($question->author_id == Yii::$app->user->id): ?>
                <span><?= Html::a(Yii::t('app', '编辑'), ['question/update', 'id' => $question->id]) ?></span>
                <?php endif; ?>
                <span><?= $question->count_comment > 0 ? $question->count_comment . ' ' : '' ?><?= Yii::t('app', '评论') ?></span>
            </div>
        </div>

        <h2 class="h4 question-answer">
            <?= Yii::t('app', '{count} 个回答', ['count' => $question->count_answer]) ?>
        </h2>

        <?= ListView::widget([
            'emptyText' => '',
            'itemOptions' => ['class' => 'answer-item'],
            'dataProvider' => $dataProvider,
            'itemView' => 'answer-item',
            'summary' => '',
        ]) ?>

        <?php if ($myAnswer) { ?>
            <div class="text-center">
                <?= Yii::t('app', '这个问题您已经提交过答案, 您可以对<a href="{href}">现有答案</a>进行<a href="{href_edit}">修改</a>', ['href' => '#answer-'.$myAnswer->id, 'href_edit' => Url::to(['answer/update', 'question_id' => $question->id, 'answer_id' => $myAnswer->id])]) ?>
            </div>
        <?php } else { ?>
            <?php $form = ActiveForm::begin(['action' => ['answer/create', 'question_id' => $question->id]]) ?>
            <?= $form->field($answer, 'body')->widget(Widget::className(), [
                'options' => [
                    'style' => 'display:none',
                ],
                'settings' => [
                    'lang' => 'zh_cn',
                    'formatting' => ['blockquote', 'pre'],
                    'minHeight' => 200,
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'fileUpload' => Url::to(['/site/file-upload']),
                    'plugins' => [
                        'table',
                        'video',
                        'fullscreen',
                    ],
                ],
            ])->label(false) ?>
            <?= $form->field($answer, 'is_anonymous')->checkbox() ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', '发布回答'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        <?php } ?>
    </div>


    <div class="col-xs-12 col-md-3 side">
        <?= \app\widgets\SideBarWidget::widget() ?>
    </div>

</div>
</div> <!-- /container -->