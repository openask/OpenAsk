<?php


namespace app\models\traits;

use app\models\Answer;
use app\models\Comment;
use app\models\Question;
use app\models\Relation;
use app\models\Feed;
use yii\db\IntegrityException;

trait VoteTrait
{
    // 顶
    public function voteUp()
    {
        list($vote_up, $vote_down) = $this->getVoteTypeValue();
        // 找到当前用户对记录的顶踩状态，如果已经顶过，则取消顶
        $voteLog = $this->voteLog;
        if ($voteLog && $voteLog->type == $vote_up && $voteLog->delete()) { // 已经顶过，取消顶状态
            $this->updateCounters(['count_approve' => -1]);
            return ['up' => -1, 'down' => 0];
        } else { // 未顶过，分两种情况，a 踩过 b 未踩过
            // 先删除踩的记录
            $down = 0;
            if ($voteLog && $voteLog->type == $vote_down && $voteLog->delete()) {
                $this->updateCounters(['count_oppose' => -1]);
                $down = -1;
            }
            // 增加顶的记录
            try {
                $rel = new Relation(['type' => $vote_up, 'from' => \Yii::$app->user->id, 'target' => $this->id]);
                if ($rel->save()) {
                    $this->updateCounters(['count_approve' => 1]);
                    return ['up' => 1, 'down' => $down];
                }
            } catch (IntegrityException $e) { // 并发插入的话可能 MySQL 唯一索引报错导致抛出异常
                return ['up' => 0, 'down' => $down];
            }
        }
    }

    // 踩
    public function voteDown()
    {
        list($vote_up, $vote_down) = $this->getVoteTypeValue();
        $voteLog = $this->voteLog;
        if ($voteLog && $voteLog->type == $vote_down && $voteLog->delete()) {
            $this->updateCounters(['count_oppose' => -1]);
            return ['up' => 0, 'down' => -1];
        } else {
            $up = 0;
            if ($voteLog && $voteLog->type == $vote_up && $voteLog->delete()) {
                $this->updateCounters(['count_approve' => -1]);
                $up = -1;
            }
            try {
                $rel = new Relation(['type' => $vote_down, 'from' => \Yii::$app->user->id, 'target' => $this->id]);
                if ($rel->save()) {
                    $this->updateCounters(['count_oppose' => 1]);
                    return ['down' => 1, 'up' => $up];
                }
            } catch (IntegrityException $e) { // 并发插入的话可能 MySQL 唯一索引报错导致抛出异常
                return ['down' => 0, 'up' => $up];
            }
        }
    }

    public function getVoteLog()
    {
        list($vote_up, $vote_down) = $this->getVoteTypeValue();
        return $this->hasOne(Relation::className(), ['target' => 'id'])->andWhere(['from' => \Yii::$app->user->id, 'type' => [$vote_up, $vote_down]]);
    }

    public function getIsVotedUp()
    {
        list($vote_up, $vote_down) = $this->getVoteTypeValue();
        return !\Yii::$app->user->isGuest
            && $this->voteLog
            && $this->voteLog->type == $vote_up;
    }

    public function getIsVotedDown()
    {
        list($vote_up, $vote_down) = $this->getVoteTypeValue();
        return !\Yii::$app->user->isGuest
            && $this->voteLog
            && $this->voteLog->type == $vote_down;
    }

    public function getVoteTypeValue()
    {
        if ($this instanceof Question) {
            return [Relation::TYPE_APPROVE_QUESTION, Relation::TYPE_OPPOSE_QUESTION];
        } else if ($this instanceof Answer) {
            return [Relation::TYPE_APPROVE_ANSWER, Relation::TYPE_OPPOSE_ANSWER];
        } else if ($this instanceof Comment) {
            return [Relation::TYPE_APPROVE_COMMENT, 0];
        }
    }
}