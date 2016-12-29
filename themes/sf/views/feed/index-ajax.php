<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upliu.net>
 * Date: 22/12/2016
 * Time: 11:41
 */

?>


<?= yii\widgets\ListView::widget([
    'itemOptions' => ['class' => 'question-item'],
    'dataProvider' => $dataProvider,
    'itemView' => '_feed-item',
    'summary' => '',
]) ?>
<?php foreach ($dataProvider->models as $userActionHistory): ?>
    <?= $this->render('_feed-item', ['userActionHistory' => $userActionHistory]) ?>
<?php endforeach; ?>
