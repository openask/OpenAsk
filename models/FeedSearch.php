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
        $this->_query = Feed::find();
    }

    public function search($offset = null, $limit = 20)
    {
        if ($offset) {
            $this->_query->andWhere(['<', 'id', $offset]);
        }
        $this->_query->limit($limit);
        $feeds = $this->_search();
        if (isset($feeds[0])) {
            $this->user->profile->last_read_feed = $feeds[0]->id;
            $this->user->profile->save();
        }
        return $feeds;
    }

    protected function _search()
    {
        // 我关注的话题 新增问题 新增答案
        // 我关注的用户 新增问题 新增答案
        $user = $this->user;
        $user_id = $user->id;
        $questionIds1 = Relation::getFollowedQuestionIds($user_id);
        $questionIds2 = Relation::getQuestionIdsOfFollowedTopic($user_id);
        $questionIds = array_unique(array_merge($questionIds1, $questionIds2));
        $feeds = $this->_query
            ->with('question', 'user')
            ->orderBy('id desc')
            ->andWhere(['!=', 'user_id', $user_id])
            ->andWhere([
                'or',
                [
                    'user_id' => Relation::getFollowedUserIds($user_id)
                ],
                [
                    'question_id' => $questionIds
                ],
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
            ->andWhere(['>', 'id', $user->profile->last_read_feed])
            ->count();
    }
}
