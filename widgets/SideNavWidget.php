<?php


namespace app\widgets;


use yii\base\Widget;

class SideNavWidget extends Widget
{
    public function run()
    {
        return $this->render('side-nav-widget');
    }
}