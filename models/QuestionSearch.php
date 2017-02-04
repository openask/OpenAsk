<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;
use app\models\QuestionTopic;

/**
 * PostSearch represents the model behind the search form about `app\models\Post`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'author_id', 'pid', 'count_comment', 'count_answer', 'count_view', 'count_approve', 'count_oppose', 'count_follow', 'count_thank', 'count_mark', 'count_no_help', 'is_lock', 'is_anonymous'], 'integer'],
            [['title', 'body'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Question::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author_id' => $this->author_id,
            'pid' => $this->pid,
            'count_comment' => $this->count_comment,
            'count_answer' => $this->count_answer,
            'count_view' => $this->count_view,
            'count_approve' => $this->count_approve,
            'count_oppose' => $this->count_oppose,
            'count_follow' => $this->count_follow,
            'count_thank' => $this->count_thank,
            'count_mark' => $this->count_mark,
            'count_no_help' => $this->count_no_help,
            'is_lock' => $this->is_lock,
            'is_anonymous' => $this->is_anonymous,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }

    public function index()
    {
        $query = Question::find();
        $query->with('author', 'lastAnswerAuthor', 'topics');
        $query->limit(50);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'last_active' => SORT_DESC,
                ]
            ],
            'pagination' => false
        ]);

        return $dataProvider;
    }

    public function question(Topic $topic = null, $filter = '')
    {
        $query = Question::find();
        $query->with('author', 'lastAnswerAuthor', 'topics');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'last_active' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => '20'
            ],
        ]);

        if ($topic) {
            $this->topicId($query, $topic->id);
        }

        switch ($filter) {
            case 'unanswered':
                $query->andWhere(['count_answer' => 0]);
                break;
            case 'unsolved':
                $query->andWhere(['accept_answer_id' => 0]);
                break;
        }

        return $dataProvider;
    }

    public function myAnswer($question_id, $sort = '')
    {
        $query = Answer::find();
        $query->andWhere(['question_id' => $question_id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'count_approve' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => '20'
            ],
        ]);

        switch ($sort) {
            case 'created':
                $query->orderBy('created_at desc');
                break;
        }

        return $dataProvider;
    }

    protected function topicId($query, $topic_id)
    {
        return $query->andWhere(['in', 'id',
            QuestionTopic::find()->select('question_id')->where(['topic_id' => $topic_id])->column()
        ]);
    }
}
