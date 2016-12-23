<?php


namespace app\widgets;


use yii\base\Widget;

class AskWidget extends Widget
{
    public function run()
    {
        return $this->render('ask-widget');
    }
}