<?php
use app\helpers\Helper;
use app\models\User;
use app\themes\sf\ThemeAsset;
use kartik\icons\Icon;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */


Icon::map($this);

ThemeAsset::register($this);

$this->beginContent('@app/views/layouts/minimal.php');

/** @var User $user */
$user = Yii::$app->user->identity;
?>


<?php $this->beginBlock('search-form'); ?>
    <form class="navbar-form navbar-left" role="search" method="get" action="<?= Url::to(['search/index']) ?>">
        <input type="hidden" name="type" value="content">
        <div class="form-group">
            <div class="input-group">
                <input required type="text" id="q" name="q" class="form-control" placeholder="<?= Yii::t('app', '搜索你感兴趣的内容...') ?>">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>
    </form>
<?php $this->endBlock(); ?>

<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => ['global-nav']
    ]
]);

$items = [
    $this->blocks['search-form'],
];
if (!Yii::$app->user->isGuest) {
    $items[] = [
        'label' => Yii::t('app', '提问'),
        'encode' => false,
        'url' => ['/question/create'],
    ];
    $items[] = [
        'label' => Icon::show('bell'),
        'encode' => false,
        'url' => ['/notification/index'],
    ];
}
$items[] = $this->render('_user');
echo Nav::widget([
    'options' => ['class' => 'navbar-nav pull-right'],
    'items' => $items,
]);

echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => Yii::t('app', '首页'), 'url' => ['/index/index']],
        ['label' => Yii::t('app', '话题'), 'url' => ['/topic/index']],
        ['label' => Yii::t('app', '会员'), 'url' => ['/users/index']],
    ],
]);
NavBar::end();
?>

<div class="global-nav-tags">
<div class="container">
    <?php
    $items = [
        ['label' => Icon::show('home', [], null, false).Yii::t('app', '首页'), 'url' => ['/index/index'], 'encode' => false, 'linkOptions' => ['class' => 'link']],
        ['label' => Icon::show('list-alt', [], null, false).Yii::t('app', '动态'), 'url' => ['/feed/index'], 'encode' => false, 'linkOptions' => ['class' => 'link']],
        '<li class="space">|</li>',
    ];

    foreach (Helper::getOpenAskConfig('topic_names') as $topicName) {
        $items[] = [
            'label' => $topicName,
            'url' => ['/question/index', 'topic' => $topicName],
            'linkOptions' => ['class' => 'topic'],
        ];
    }

    $items[] = [
        'label' => '···',
        'url' => ['/topic/index'],
        'options' => ['class' => 'all-topic'],
    ];

    echo Nav::widget([
        'items' => $items
    ]);
    ?>
</div>
</div>

    <?= $content ?>

<script id="message-box" type="text/html">
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="Message" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= \Yii::t('app', '提示') ?></h4>
                </div>
                <div class="modal-body">
                {{ message }}
                </div>
            </div>
        </div>
    </div>
</script>

<?php
$this->endContent();
