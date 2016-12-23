<?php


namespace app\widgets;


use yii\base\Widget;

class SideBarWidget extends Widget
{
    public function run()
    {
        return $this->render('side-bar-widget');
    }
}