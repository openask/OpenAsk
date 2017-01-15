<?php
use yii\helpers\Html;
use app\models\Comment;
use yii\bootstrap\ActiveForm;
use kartik\icons\Icon;

/** @var Comment $comment */
/** @var Comment[] $comments */

\app\themes\sf\ThemeAsset::registerJsFile('comment-widget.js', $this);
?>

<?php //输出评论列表，默认取出被赞过的评论，点击评论展开全部，再次点击收起来 ?>
<div class="comment-box widget widget-comment <?= empty($comments) && empty($comment) ? 'hidden' : '' ?>">
    <div class="comments">
        <?php foreach ($comments as $co): ?>
            <?php //@todo display_name 用户设置的时候不允许特殊字符，因此这里没有进行 encode  ?>
            <div class="comment-item <?= $co->voteLog ? 'voted' : '' ?>" data-id="<?= $co->id ?>" data-author_display_name="<?= $co->author->profile->display_name ?>">
                <div class="vote">
                    <div class="cmd-comment-vote vote-btn"><?= Icon::show('sort-asc') ?></div>
                    <div class="count <?= $co->count_approve > 0 ? 'show' : '' ?>">+<?= $co->count_approve ?></div>
                </div>
                <div class="offset">
                    <?php if ($co->replyAuthor): ?>
                        <div class="reply">
                            <?= \Yii::t('app', '回复') ?> <?= Html::a($co->replyAuthor->profile->display_name, ['/people/view', 'slug' => $co->replyAuthor->profile->slug]) ?><?= \Yii::t('app', '：') ?>
                        </div>
                    <?php endif; ?>
                    <div class="body">
                        <?= Html::encode($co->body) ?>
                    </div>
                    <div class="comment-meta">
                        <?= Html::a("<strong>{$co->author->profile->display_name}</strong>", ['/people/view', 'slug' => $co->author->profile->slug]) ?>
                        ·
                        <span class="meta"><?= Yii::$app->formatter->asRelativeTime($co->created_at) ?></span>
                        <span class="op pull-right">
                            <?php if ($co->author_id == \Yii::$app->user->id): ?>
                        <a class="cmd-delete-comment" href="javascript:;"><?= Icon::show('trash') ?></a>
                            <?php endif; ?>
                        <a class="cmd-reply-comment" href="javascript:;"><?= Icon::show('reply') ?></a>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div> <!-- .comments -->

    <?php if (isset($comment)): ?>
        <?php /* @var $commentForm yii\widgets\ActiveForm */ ?>
        <?php $commentForm = ActiveForm::begin([
            'layout' => 'inline',
            'options' => ['class' => 'clearfix form-comment', 'id' => false],
        ]) ?>
        <?= $commentForm->field($comment, 'body')->textarea(['rows' => 1, 'id' => false])->label(false) ?>
        <?= Html::submitButton(\Yii::t('app', '提交评论'), ['class' => 'btn btn-default pull-right']) ?>
        <?php ActiveForm::end(); ?>
    <?php endif; ?>

    <?php if (isset($showExpand)): ?>
        <a class="expand-comments cmd-toggle-comment" href="javascript:;"><?= \Yii::t('app', '展开评论') ?></a>
    <?php endif; ?>
</div>

