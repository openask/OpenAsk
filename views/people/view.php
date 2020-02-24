<?php

use app\helpers\Helper;
use app\models\Map;
use app\models\UserFollow;
use kartik\icons\Icon;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$this->title = $user->display_name;

$feed = \app\models\Feed::findOne(102);
?>
<div class="i-people-view">
    <div class="i-profile-section i-people-info">
        <div class="i-desc">
        <div title="<?= $user->headline ?>" class="i-head-title"><span class="i-name"><?= $user->display_name ?></span> ，<?= $user->headline ?></div>
        <div class="clearfix">
            <img src="<?= $user->avatar ?>" alt="<?= $user->display_name ?>"
                 class="i-avatar i-avatar-l i-people-info-avatar">
            <div class="i-info-wrap">
            <div class="i-info-line">
                <?= Icon::show('map-marker') ?>
                <span class="i-item"><?= $user->location ?></span>
                <span class="i-item"><?= $user->business ?></span>
                <span class="i-item">
                <?= $user->getIsMan() ? Icon::show('mars') : ($user->getIsWoman() ? Icon::show('venus') : '') ?></span>
            </div>
            <div class="i-info-bio">
                <?= $user->bio ?>
            </div>
            </div>
        </div>
        </div>
        <div class="i-extra">
            获得
            <span class="i-item-point">
            <?= Icon::show('thumbs-up') ?> <strong><?= $user->count_approve ?></strong> 赞同
                </span>
            <span class="i-item-point">
            <?= Icon::show('heart') ?> <strong><?= $user->count_thank ?></strong> 感谢
                </span>
            <div class="i-buttons">
            <?php if ($user->id == Yii::$app->user->id) { ?>
                <a href="<?= Url::to(['/people/edit']) ?>" class="i-btn i-btn-green i-head-user-action-btn"><?= Yii::t('app', '编辑我的资料') ?></a>
            <?php } else { ?>
                <span class="i-head-user-action-btn"><?= Helper::renderFollowButton(Yii::$app->user->id, $user) ?></span>
                <a class="i-btn i-btn-white i-head-user-action-btn">
                    <?= Icon::show('envelope-o') ?>
                </a>
            <?php } ?>
            </div>
        </div>
        <div class="i-stat">
            <?= Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'encodeLabels' => false,
                'activateItems' => false,
                'items' => [
                    ['label' => Icon::show('home'), 'url' => ['/people/view', 'slug' => $user->slug], 'options' => ['class' => 'i-home']],
                    ['label' => Yii::t('app', '提问') . " <span>{$user->count_ask}</span>", 'url' => ['/people/asks', 'slug' => $user->slug]],
                    ['label' => Yii::t('app', '回答') . " <span>{$user->count_answer}</span>", 'url' => ['/people/answers', 'slug' => $user->slug]],
                    ['label' => Yii::t('app', '收藏') . " <span>{$user->count_mark}</span>", 'url' => ['/people/collections', 'slug' => $user->slug]],
                ],
            ]) ?>
        </div>
    </div>

    <dl class="i-profile-section">
        <dt><a href="#"><?= Yii::t('app', '回答') ?> <?= Icon::show('chevron-right') ?></a></dt>
        <dd>
            <div class="i-vote-count">
                <div class="i-count">45</div>
                <div class="i-note"><?= Yii::t('app', '赞同') ?></div>
            </div>
            <div class="i-content">
            <h2><a href="#">如何看待广电总局新规定：手游中不得出现英文以及繁体字？</a></h2>
            <div>美国的游戏可以只有阿拉伯数字和英文，中国当然也可以！</div>
            </div>
        </dd>
    </dl>

    <dl class="i-profile-section">
        <dt><a href="#"><?= Yii::t('app', '提问') ?> <?= Icon::show('chevron-right') ?></a></dt>
        <dd>
            <div class="i-view-count">
                <div class="i-count">5315</div>
                <div class="i-note"><?= Yii::t('app', '浏览') ?></div>
            </div>
            <div class="i-content">
            <h2><a href="#">食品添加清真认证所带来的成本，通常是通过降低质量还是提高价格来补偿的？</a></h2>
            <div class="i-meta">
                <a href="javascript:;" class="i-meta-item cmd-pay-attention"><span class="glyphicon glyphicon-plus"></span> <?=Yii::t('app', '关注问题')?></a>
                <a href="javascript:;" class="i-meta-item"><?=Yii::t('app', '{n} 个回答', ['n' => 28])?></a>
                <a href="javascript:;" class="i-meta-item"><?=Yii::t('app', '{n} 人关注', ['n' => 117])?></a>
            </div>
                </div>
        </dd>
    </dl>

    <dl class="i-profile-section">
        <dt><?= Yii::t('app', '最新动态') ?></dt>
        <?php $i = 10; while ($i-- > 0) { ?>
            <dd><?= $this->render('/_inc/feed-item', ['feed' => $feed]) ?></dd>
        <?php } ?>
        <dd class="i-load-more-wrap">
            <button class="i-load-more cmd-load-more">
                <?=Yii::t('app', '正在加载...')?>
            </button>
        </dd>
    </dl>
</div>
