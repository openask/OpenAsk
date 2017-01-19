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

<?= $this->render('_question-header', ['question' => $question]) ?>

<div class="container mt30">
<div class="row">
    <div class="col-xs-12 col-md-9 main">

        <?= $this->render('_question-detail', ['question' => $question]) ?>

        <h2 class="h4 question-answer">
            <?= Yii::t('app', '{count} 个回答', ['count' => $question->count_answer]) ?>
        </h2>

        <div class="answer-item">
            <?= $this->render('answer-item', ['model' => $viewAnswer]) ?>
        </div>

        <div class="mt20">
            <?= Html::a(Yii::t('app', '<strong>查看全部 {count} 个回答</strong>', ['count' => $question->count_answer]), ['view', 'id' => $question->id]) ?>
        </div>

    </div>


    <div class="col-xs-12 col-md-3 side">
        <?= \app\widgets\SideBarWidget::widget() ?>
    </div>

</div>
</div> <!-- /container -->
