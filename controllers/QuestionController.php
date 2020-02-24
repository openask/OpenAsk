<?php
/**
 * Created by IntelliJ IDEA.
 * User: liu
 * Date: 6/28/16
 * Time: 10:52 PM
 */

namespace app\controllers;


use app\models\Answer;
use app\models\Post;
use app\models\QuestionSearch;
use app\models\Question;
use app\models\Feed;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Topic;
use yii\filters\VerbFilter;

class QuestionController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'follow', 'mark', 'vote'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verb' => [
                'class' => VerbFilter::className(),
                'actions' => [
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
                'modelClass' => 'app\models\Question',
            ],
        ];
    }

    public function actionIndex($topic = '', $filter = '')
    {
        if ($topic) {
            $topic = Topic::findByName($topic);
            if (!$topic) {
                $topic = new Topic();
            }
        } else {
            $topic = null;
        }
        $search = new QuestionSearch();
        $dataProvider = $search->question($topic, $filter);
        return $this->render('index', ['dataProvider' => $dataProvider, 'topic' => $topic, 'filter' => $filter]);
    }

    public function actionCreate()
    {
        $model = new Question();
        $model->author_id = \Yii::$app->user->id;

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'post' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'post' => $model,
            ]);
        }
    }

    public function actionView($id, $sort = '')
    {
        $question = $this->findModel($id);
        $question->updateCounters(['count_view' => 1]);
        $answer = new Answer();
        $dataProvider = $question->answerSearch($sort);
        $myAnswer = !\Yii::$app->user->isGuest ? $question->myAnswer(\Yii::$app->user->id) : null;
        return $this->render('view', [
            'question' => $question,
            'dataProvider' => $dataProvider,
            'answer' => $answer,
            'myAnswer' => $myAnswer,
        ]);
    }

    public function actionAnswer($question_id, $answer_id)
    {
        $question = $this->findModel($question_id);
        $viewAnswer = Answer::findOne(['id' => $answer_id]);
        if (!$viewAnswer || $viewAnswer->question_id != $question_id) {
            throw new NotFoundHttpException();
        }
        $answer = new Answer();
        return $this->render('answer', [
            'question' => $question,
            'answer' => $answer,
            'viewAnswer' => $viewAnswer,
        ]);
    }

    /**
     * @param $id
     * @return null|Question
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(\Yii::t('app', '页面不存在'));
        }
    }

    /**
     * 关注问题
     * @param int $id
     * @return array
     */
    public function actionFollow($id)
    {
        \Yii::$app->response->format = 'json';
        $model = $this->findModel($id);
        $status = Feed::followQuestion(
            \Yii::$app->user->id,
            $model
        );
        return [
            'count' => $model->count_follow,
            'status' => $status,
        ];
    }

    /**
     * 收藏问题
     * @param int $id
     * @return array
     */
    public function actionMark($id)
    {
        \Yii::$app->response->format = 'json';
        $model = $this->findModel($id);
        $status = Feed::markQuestion(
            \Yii::$app->user->id,
            $model
        );
        return [
            'count' => $model->count_mark,
            'status' => $status,
        ];
    }
}
