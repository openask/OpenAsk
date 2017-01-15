<?php
use app\models\User;
use yii\helpers\Url;
use yii\bootstrap\Dropdown;

?>

<?php if (Yii::$app->user->isGuest){ ?>

    <li>
        <a href="<?= Url::to(Yii::$app->user->loginUrl) ?>" class="btn login">注册 · 登录</a>
    </li>

<?php } else { /** @var User $user */ $user = Yii::$app->user->identity;  ?>

    <li class="i-userinfo dropdown">
        <a href="<?= Url::to(['/people/view', 'slug' => $user->profile->slug]) ?>"><?= $user->profile->display_name ?></a>
        <?= Dropdown::widget([
            'encodeLabels' => false,
            'items' => [
                ['label' => '<span class="glyphicon glyphicon-user"></span> '.Yii::t('app', '我的主页'), 'url' => ['/people/view', 'slug' => $user->profile->slug]],
                ['label' => '<span class="glyphicon glyphicon-envelope"></span> '.Yii::t('app', '私信'), 'url' => ['/inbox/index']],
                ['label' => '<span class="glyphicon glyphicon-cog"></span> '.Yii::t('app', '设置'), 'url' => ['/settings/index']],
                ['label' => '<span class="glyphicon glyphicon-off"></span> '.Yii::t('app', '退出'), 'url' => ['/site/logout']],
            ],
        ]) ?>
    </li>

<?php } ?>
