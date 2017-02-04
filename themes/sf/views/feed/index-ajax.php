<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upliu.net>
 * Date: 22/12/2016
 * Time: 11:41
 */

?>

<?php foreach ($dataProvider->models as $feed): ?>
    <?= $this->render('_feed-item', ['feed' => $feed]) ?>
<?php endforeach; ?>
