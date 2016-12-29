<?php


namespace app\models;

use yii\base\Object;
use yii\db\ActiveQuery;

class FeedSearch extends Object
{
    /** @var User $user */
    public $user;

    /**
     * @var ActiveQuery
     */
    protected $_query;

    public function init()
    {
        $this->user = $this->user ?: \Yii::$app->user->identity;
        $this->_query = UserActionHistory::find();
    }

    public function search($offset = null, $limit = 20)
    {
        if ($offset) {
            $this->_query->andWhere(['<', 'id', $offset]);
        }
        $this->_query->limit($limit);
        $feeds = $this->_search($this->user->id);
        if (isset($feeds[0])) {
            $this->user->meta->last_read_feed = $feeds[0]->id;
            $this->user->meta->save();
        }
        return $feeds;
    }

    protected function _search()
    {
        //@todo 下面这个 SQL 太复杂，有待优化，否则可能导致性能低下
        // 我关注的话题 新增问题 新增答案
        // 我关注的用户 新增问题 新增答案
        $user = $this->user;
        $user_id = $user->id;
        $feeds = $this->_query
            ->with('question', 'author', 'historyData')
            ->orderBy('id desc')
            ->andWhere('is_anonymous=0')
            ->andWhere(['!=', 'user_id', $user_id])
            ->andWhere([
                'or',
                [
                    'user_id' => UserFollow::getFollowsQuery($user->id)
                ],
                [
                    'question_id' => TopicFollow::find()->select('question_id')->where(['user_id' => $user_id])
                ],
                [
                    'question_id' => QuestionFollow::find()->select('question_id')->where(['user_id' => $user_id])
                ]
            ])
            ->all();

        return $feeds;
    }

    public function countNewFeed()
    {
        $user = $this->user;
        // @todo 关注的话题
        return $this->_query
            ->andWhere(['user_id' => UserFollow::getFollowsQuery($user->id)])
            ->andWhere(['>', 'id', $user->meta->last_read_feed])
            ->count();
    }
}
