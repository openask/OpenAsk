<?php


namespace app\widgets;


use app\models\Comment;
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

    public $puuid;

    /**
     * @var bool 是否只显示被赞过的评论
     */
    public $onlyShowVoted = true;

    public function init()
    {
        parent::init();
        if (empty($this->puuid)) {
            throw new InvalidConfigException('Property puuid should be set.');
        }
    }

    public function run()
    {
        if ($this->onlyShowVoted) {
            $comments = Comment::find()->with('author', 'replyAuthor', 'voteLog')->where(['puuid' => $this->puuid])->andWhere(['>', 'count_vote_up', 0])->orderBy('id')->all();
            return $this->render('@app/views/_widgets/comment-widget', [
                'comments' => $comments,
                'showExpand' => true,
            ]);
        } else {
            $comments = Comment::find()->with('author', 'replyAuthor', 'voteLog')->where(['puuid' => $this->puuid])->orderBy('id')->all();
            return $this->render('comment-widget', [
                'comment' => new Comment(['puuid' => $this->puuid]),
                'comments' => $comments,
            ]);
        }
    }

}
