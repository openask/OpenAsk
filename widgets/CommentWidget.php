<?php


namespace app\widgets;


use app\models\Answer;
use app\models\Comment;
use app\models\Question;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\base\Widget;

/**
 * 评论通用组件
 * 显示评论列表并显示新增评论表单
 * CommentWidget
 */
class CommentWidget extends Widget
{

    /**
     * @var Question | Answer
     */
    public $model;

    /**
     * @var bool 是否只显示被赞过的评论
     */
    public $onlyShowApproval = true;

    public function run()
    {
        $query = $this->model->getComments()->with('author', 'replyAuthor', 'voteLog')->orderBy('id');
        if ($this->onlyShowApproval) {
            $query->andWhere('count_approve > 0');
            return $this->render('comment-widget', [
                'comments' => $query->all(),
                'showExpand' => true,
                'model' => $this->model,
            ]);
        } else {
            return $this->render('comment-widget', [
                'comments' => $query->all(),
                'model' => $this->model,
                'comment' => $this->model->newComment(),
            ]);
        }
    }

}
