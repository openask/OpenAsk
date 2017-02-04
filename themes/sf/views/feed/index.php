<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 21/12/2016
 * Time: 09:59
 */

/* @var $this yii\web\View */

\app\themes\sf\ThemeAsset::registerJsFile('feed.js', $this);
?>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">

            <div class="feed-index">
                <h4 class="pt30 feed-index-title"><?= Yii::t('app', '最新动态') ?></h4>
                <div id="feed-wrap"></div>
            </div>
        </div>

        <div class="col-xs-12 col-md-3 side pt30">

            <?= app\widgets\SideBarWidget::widget() ?>

        </div>
    </div>
</div>
