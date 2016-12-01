<?php


namespace app\controllers;


use app\models\Question;
use yii\web\Controller;
use app\models\Answer;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AnswerController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'create' => ['post'],
                    'vote' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'vote' => [
                'class' => 'app\actions\VoteAction',
                'modelClass' => 'app\models\Answer',
            ],
        ];
    }

    public function actionCreate($question_id)
    {
        $question = Question::findOne($question_id);
        if (!$question) {
            throw new NotFoundHttpException();
        }
        $answer = new Answer(['question_id' => $question_id]);
        $answer->author_id = \Yii::$app->user->id;
        if ($answer->load(\Yii::$app->request->post()) && $answer->save()) {
            return $this->redirect(['question/answer', 'question_id' => $question_id, 'answer_id' => $answer->id]);
        }

        print_r($answer->errors);
    }

    public function actionUpdate($id)
    {
        $answer = Answer::findOne(['id' => $id]);
        if (!$answer) {
            throw new NotFoundHttpException();
        }
        // 只允许作者自身编辑自己的答案
        if ($answer->author_id != \Yii::$app->user->id) {
            throw new ForbiddenHttpException();
        }
        $answer->scenario = 'update';
        if ($answer->load(\Yii::$app->request->post())) {
            if ($answer->is_deleted && $answer->delete()) {
                return $this->redirect(['question/view', 'id' => $answer->question_id]);
            } else {
                $answer->save();
                return $this->redirect(['question/answer', 'question_id' => $answer->question_id, 'answer_id' => $answer->id]);
            }
        }
    }

}
