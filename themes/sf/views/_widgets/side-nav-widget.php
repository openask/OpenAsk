<?php
use yii\helpers\Html;
?>

<ul class="nav widget widget-side-nav">
    <li><?= Html::a(Yii::t('app', '我的草稿') . ' <span class="badge">42</span>', ['user/draft']) ?></li>
    <li><?= Html::a(Yii::t('app', '我的收藏'), ['people/bookmarks', 'slug' => Yii::$app->user->identity->profile->slug]) ?></li>
    <li><?= Html::a(Yii::t('app', '我关注的'), ['people/follow', 'slug' => Yii::$app->user->identity->profile->slug]) ?></li>
</ul>
