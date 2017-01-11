<?php
use app\models\Question;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var Question $model */
/* @var string $key */

$question = $model;
?>

<div class="question-rank">
    <div class="vote">
<?= $question->count_approve - $question->count_oppose ?> <div><?= Yii::t('app', '投票') ?></div>
    </div>
    <div class="answer <?= $question->accept_answer_id ? 'solved' : ($question->count_answer ? 'answered' : '') ?>">
<?= $question->count_answer ?> <div><?= Yii::t('app', $question->accept_answer_id ? '解决' : '回答') ?></div>
    </div>
    <div class="view">
<?= $question->count_view ?> <div><?= Yii::t('app', '浏览') ?></div>
    </div>
</div>

<div class="summary">
    <div class="author">
<?= $question->lastAnswerAuthor ?
    $question->lastAnswerAuthor->display_name :
    $question->author->display_name ?>
 ·
<?= Yii::$app->formatter->asRelativeTime($question->last_active) ?>
<?= Yii::t('app', $question->lastAnswerAuthor ? '回答' : '提问') ?>
    </div>

    <div>
        <?= Html::a($question->title, ['question/view', 'id' => $question->id], ['class' => 'title']) ?>
    </div>

<ul class="tag-list">
    <?php foreach ($question->topics as $topic) : ?>
        <li><?= Html::a($topic->name, $topic->getUrl()) ?></li>
    <?php endforeach; ?>
</ul>
</div>
