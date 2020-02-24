<?php
use app\assets\AppAsset;
use app\helpers\Helper;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $feed app\models\Feed */

$author = $feed->user;
$answer = $feed->answer;
$question = $feed->question;

$QUESTION_ID = 47638946;
$ANSWER_ID = 17629946;
$ANSWER_USER = 'jin-cheng-qi';
$ANSWER_NICK = '金城七';
$ANSWER_BIO = '，浮生长恨欢娱少，肯爱千金轻一笑。';
$ANSWER_CONTENT = <<<HTML
<blockquote>“我真的爱死这个国家了......是的，社会主义国家，贫穷，没有自由，没有网络，可是治安多好，多么安全！孩子们多么天真无邪！和西方国家不同，这里的孩子们不会接触到暴力毒品，他们在和平安乐的环境里长大。你有没有留意过他们的眼睛？......”</blockquote><br>教你如何扮演：<br>总之讨论问题的时候一定要化身李克忠就对了，辩证法要学得超级棒，一定要在成为波士顿人之后满怀饱饱的White guilt，一定要在谈论一个落后（或 无耻/邪恶）国家时，理性分析该国落后的原因，讲述当地被欧洲殖民的悲惨历史，以及在独立后被美国介入内政和操纵经济的耻辱<br><br>最重要的是，时刻提醒自己，不要因为在资本主义国家生活多年，就选择站在强者和征服者那一边轻易做出 <b>JUDGE，</b>注重强调文化的多样性，强调人与自然的和谐相处<br><br>和国内朋友聊天时的惯用语包括但不限于：“只有国内才能做到最好”、“机会全在国内”、“好想回国啊啊啊”；<br><br>和外国人谈到中国时强调还是我们国内好，你们外国人就是 naive 就是笨，不了解中国国情就瞎 BB，更重要的是，一定要学好英语，去 Quora上洋洋洒洒数千字为我档我兔辩护<br><br>还有一定要记得，可以不（明显）崇拜卡斯楚，但一定要崇拜切格瓦拉（一个观察）<br><br>啊差点忘了，还一定要“ <b>No politics today</b> ! ” “<b>不谈政治！</b>
HTML;


/* @var $this \yii\web\View */

$this->registerJsFile('@web/static/dist/feed-item.js', ['depends' => AppAsset::className()]);
?>

<div class="i-feed-item">
    <div class="i-avatar">
        <a href="<?=Url::to(['/people/view', 'slug' => $author->slug])?>"><img src="<?=Url::to(['/site/img', 'w' => 38])?>" alt=""></a>
    </div>
    <div class="i-feed-main">
        <div class="i-feed-source">
            <a href="<?=Url::to(['/people/view', 'slug' => $author->slug])?>"> <?= $author->display_name ?></a>
            <?= $feed->getTypeDesc() ?>
            <span class="i-time"><?=Yii::$app->formatter->format($feed->created_at, 'RelativeTime')?></span>
        </div>
        <h2 class="i-title">
            <a target="_blank" href="<?=Url::to(['/question/view', 'id' => $question->id ])?>"><?= $question->title ?></a>
            <span class="i-ignore cmd-ignore-question" data-toggle="tooltip" data-placement="bottom" title="<?=Yii::t('app', '不再显示')?>">&times;</span>
        </h2>
        <div class="cmd-expand i-entry-body">
            <div class="i-vote">
                <span class="i-vote-btn cmd-vote">418</span>
                <div class="i-vote-up-down i-hide">
                                <span class="i-vote-btn i-up">
                                    <span class="glyphicon glyphicon-thumbs-up"></span><br>
                                    418</span>
                                <span class="i-vote-btn i-down">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                </span>
                </div>
            </div>
            <?php if ($answer): ?>
            <div class="i-author-info">
                <a class="i-author-link" href="<?=Url::to(['/people/view', 'slug' => $ANSWER_USER])?>"><?=$ANSWER_NICK?></a>
                <?=$ANSWER_BIO?>
            </div>
            <div class="i-summary">
                <?php $f = 0 ?>
                <?=Helper::summary($ANSWER_CONTENT, 126, $f)?>
                <?php if ($f): ?>
                    <a href="javascript:;" class="i-show-all"><?=Yii::t('app', '显示全部')?></a>
                <?php endif; ?>
            </div>
            <div class="i-visible-expanded">
                <div class="i-post-content">
                <?=$ANSWER_CONTENT?>
                </div>
                <div class="i-pubtime"><a class="i-meta" target="_blank" href="<?=Url::to(['/question/answer', 'qid' => $QUESTION_ID, 'aid' => $ANSWER_ID])?>"  data-toggle="tooltip" data-placement="top" title="<?=Yii::t('app', '发布于 {time}', ['time' => '2016-06-26'])?>"><?=Yii::t('app', '编辑于 {time}', ['time' => '2016-06-26'])?></a></div>
            </div>
            <?php endif; ?>
        </div>
        <div class="i-feed-meta">
            <a href="javascript:;" class="i-meta-item cmd-pay-attention"><span class="glyphicon glyphicon-plus"></span> <?=Yii::t('app', '关注问题')?></a>
            <a href="javascript:;" class="i-meta-item cmd-show-comment"><span class="glyphicon glyphicon-comment"></span> <?=Yii::t('app', '{n} 条评论', ['n' => 7])?></a>
            <a href="javascript:;" class="i-meta-item"><span class="glyphicon glyphicon-comment"></span> <?=Yii::t('app', '{n} 个回答', ['n' => 28])?></a>
            <?php if ($answer) : ?>
            <a href="javascript:;" class="i-meta-item cmd-thank"><span class="glyphicon glyphicon-heart"></span> <?=Yii::t('app', '感谢')?></a>
            <a href="javascript:;" class="i-meta-item cmd-share"><span class="glyphicon glyphicon-share-alt"></span> <?=Yii::t('app', '分享')?></a>
            <a href="javascript:;" class="i-meta-item cmd-bookmark"><span class="glyphicon glyphicon-bookmark"></span> <?=Yii::t('app', '收藏')?></a>
            •
            <a href="javascript:;" class="i-meta-item i-extra-btn cmd-no-help"><?=Yii::t('app', '没有帮助')?></a>
            •
            <a href="javascript:;" class="i-meta-item i-extra-btn"><?=Yii::t('app', '举报')?></a>
            <a href="javascript:;" class="i-meta-item cmd-fold i-fold"><span class="glyphicon glyphicon-collapse-up"></span> <?=Yii::t('app', '收起')?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
