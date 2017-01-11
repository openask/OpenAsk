<?php
use yii\helpers\Html;
use app\widgets\VoteWidget;
use app\widgets\CommentWidget;
?>
<div class="question-detail post" data-model="question" data-id="<?= $question->id ?>">
    <div class="vote-wrap">
        <?= VoteWidget::widget([
            'model' => $question,
        ]) ?>
    </div>
    <div class="offset">
        <div class="body">
            <?= $question->body ?: $question->title ?>
        </div>
        <div class="meta">
            <span><?= Yii::$app->formatter->asRelativeTime($question->created_at) ?><?= Yii::t('app', '提问') ?></span>
            <?php if ($question->author_id == Yii::$app->user->id): ?>
                <span><?= Html::a(Yii::t('app', '编辑'), ['question/update', 'id' => $question->id]) ?></span>
            <?php endif; ?>
            <span><a class="comment-count cmd-toggle-comment" href="javascript:;"><?= $question->count_comment > 0 ? $question->count_comment . ' ' : '' ?><?= Yii::t('app', '评论') ?></a></span>
            <span><a class="cmd-invite" href="javascript:;"><?= Yii::t('app', '邀请回答') ?></a></span>
        </div>
        <?= CommentWidget::widget(['model' => $question]) ?>
    </div>
</div>
