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
        $feeds = $this->_search();
        if (isset($feeds[0])) {
            $this->user->last_read_feed = $feeds[0]->id;
            $this->user->save();
        }
        return $feeds;
    }

    protected function _search()
    {
        // 我关注的话题 新增问题 新增答案
        // 我关注的用户 新增问题 新增答案
        $user = $this->user;
        $feeds = $this->_query
            ->with('post', 'author')
            ->select('id,uid,type,question_id,answer_id')
            ->orderBy('id desc')
            ->andWhere(['uid' => UserFollow::getFollowsQuery($user->id)])
            ->all();

        return $feeds;
    }

    public function countNewFeed()
    {
        $user = $this->user;
        // @todo 关注的话题
        return $this->_query
            ->andWhere(['uid' => UserFollow::getFollowsQuery($user->id)])
            ->andWhere(['>', 'id', $user->last_read_feed])
            ->count();
    }
}
