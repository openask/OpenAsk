<?php


namespace app\controllers;


use app\models\Answer;
use app\models\Comment;
use app\models\Question;
use app\widgets\CommentWidget;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class CommentController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'like' => ['post'],
                ],
            ],
            'access' => [
                'class' => '\yii\filters\AccessControl',
                'only' => ['index', 'delete', 'like'],
                'rules' => [
                    [
                        'allow' => true,
                        'verbs' => ['POST'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'verbs' => ['GET'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'like' => [
                'class' => 'app\actions\VoteAction',
                'modelClass' => 'app\models\Comment',
                'type' => 'up',
            ],
        ];
    }

    // ajax 取出评论列表
    public function actionIndex($model, $id)
    {
        $classMap = [
            'question' => 'app\models\Question',
            'answer' => 'app\models\Answer',
        ];

        $model = $classMap[$model]::findOne($id);

        if (\Yii::$app->request->isPost && \Yii::$app->request->isAjax) {
            \Yii::$app->response->format = 'json';
            $comment = new Comment();
            $comment->author_id = \Yii::$app->user->id;
            if ($model instanceof Question) {
                $comment->question_id = $model->id;
            } else {
                $comment->answer_id = $model->id;
            }
            if ($comment->load(\Yii::$app->request->post()) && $comment->save()) {
                return [
                    'count_comment' => $model->getComments()->count(),
                    'html' => CommentWidget::widget(['model' => $model, 'onlyShowApproval' => false]),
                ];
            } else {
                return ['errors' => $comment->errors];
            }
        }
        return CommentWidget::widget(['model' => $model, 'onlyShowApproval' => false]);
    }

    // 删除评论
    public function actionDelete($id)
    {
        $comment = Comment::findOne(['id' => $id]);
        if (!$comment) {
            throw new NotFoundHttpException();
        }
        if ( $comment->author_id != \Yii::$app->user->id
            && !\Yii::$app->user->can('delete_comment', [$comment])){
            throw new ForbiddenHttpException();
        }
        if ($comment->delete()) {
            return 'OK';
        }
    }
}
