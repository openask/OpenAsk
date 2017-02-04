<?php
/**
 * Created by PhpStorm.
 * User: upliu <i@upiu.net>
 * Date: 21/12/2016
 * Time: 09:56
 */

namespace app\controllers;


use app\models\FeedSearch;
use app\models\Feed;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class FeedController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => '\yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex($offset = '')
    {
        if (\Yii::$app->request->isAjax) {
            $feedSearch = new FeedSearch();
            $models = $feedSearch->search($offset);
            $dataProvider = new ArrayDataProvider();
            $dataProvider->allModels = $models;
            $dataProvider->modelClass = Feed::className();
            return $this->renderPartial('index-ajax', [
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->render('index');
    }
}