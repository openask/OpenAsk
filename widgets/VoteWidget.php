<?php


namespace app\widgets;


use yii\base\Widget;

class VoteWidget extends Widget
{

    public $model;

    public function run()
    {
        return $this->render('vote-widget', [
            'model' => $this->model,
        ]);
    }
}
