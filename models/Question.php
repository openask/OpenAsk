<?php


namespace app\models;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use app\models\traits\VoteTrait;

/**
 * Class Question
 * @package app\models
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property integer $created_at
 * @property integer $author_id
 * @property integer $updated_at
 * @property integer $modified_by
 * @property integer $modified_at
 * @property integer $accept_answer_id
 * @property integer $count_comment
 * @property integer $count_answer
 * @property integer $count_view
 * @property integer $count_vote_up
 * @property integer $count_vote_down
 * @property integer $count_follow
 * @property integer $count_thank
 * @property integer $count_mark
 * @property integer $count_no_help
 * @property integer $is_lock
 * @property integer $is_anonymous
 * @property integer $last_active
 * @property integer $last_answer_id
 * @property integer $last_answer_by
 *
 * @property Topic[] $topics
 * @property string[] $tagValues
 * @property User $lastAnswerAuthor
 * @property QuestionFollow $follow
 * @property QuestionMark $mark
 */
class Question extends ActiveRecord
{

    use PostTrait;

    use VoteTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%question}}';
    }

    public function attributeLabels()
    {
        return [
            'title' => \Yii::t('app', '标题'),
            'tagValues' => \Yii::t('app', '话题'),
        ];
    }

    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['id' => 'topic_id'])
            ->viaTable(QuestionTopic::tableName(), ['post_id' => 'id']);
    }

    public function scenarios()
    {
        return [
            'default' => ['title', 'body', 'is_anonymous', 'tagValues', '!author_id'],
        ];
    }

    public function rules()
    {
        return [
            [['title', 'tagValues'], 'required'],

            [['body'], 'string'],
            [['created_at', 'author_id', 'updated_at'], 'required'],
            [['created_at', 'author_id', 'updated_at', 'modified_by', 'modified_at', 'accept_answer_id', 'count_comment', 'count_answer', 'count_view', 'count_vote_up', 'count_vote_down', 'count_follow', 'count_thank', 'count_mark', 'count_no_help', 'is_lock', 'is_anonymous', 'last_active', 'last_answer_id', 'last_answer_by'], 'integer'],
            [['uuid'], 'string', 'max' => 36],
            [['title'], 'string', 'max' => 512],
        ];
    }

    private $_tagValues;

    public function getTagValues()
    {
        if (!$this->isNewRecord && $this->_tagValues === null) {
            foreach ($this->topics as $topic) {
                $this->_tagValues[] = $topic->name;
            }
        }
        return $this->_tagValues;
    }

    private $_tagValuesSeted;
    public function setTagValues($values)
    {
        $this->_tagValues = $this->filterTagValues($values);
        $this->_tagValuesSeted = true;
    }

    public function filterTagValues($values)
    {
        return array_unique(preg_split(
            '/\s*,\s*/u',
            preg_replace('/\s+/u', ' ', is_array($values) ? implode(',', $values) : $values),
            -1,
            PREG_SPLIT_NO_EMPTY
        ));
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->last_active = time();
            }
            $this->body = $this->sanitize($this->body);
            return true;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            UserActionHistory::createQuestion($this->author_id, $this);

            // 新建问题自动关注该问题
            UserActionHistory::followQuestion($this->author_id, $this, false);
        }

        if ($this->_tagValuesSeted) {
            // 删除话题关联数据
            QuestionTopic::deleteAll(['post_id' => $this->id]);
            // 添加话题关联
            foreach ($this->tagValues as $tag) {
                QuestionTopic::add($tag, $this->id, \Yii::$app->user->id);
            }
        }
    }

    public function getLastAnswerAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'last_answer_by']);
    }

    public function answerSearch($sort = '')
    {
        $query = Answer::find();
        $query->andWhere(['question_id' => $this->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'count_vote_up' => SORT_DESC,
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

    public function isAnswered($userId)
    {
        return Answer::find()->where(['question_id' => $this->id, 'author_id' => $userId])->exists();
    }

    public function myAnswer($userId)
    {
        return Answer::findOne(['question_id' => $this->id, 'author_id' => $userId]);
    }

    /**
     * 更新关注数
     */
    public function updateCountFollow()
    {
        $this->updateAttributes(['count_follow' => QuestionFollow::find()->where(['question_id' => $this->id])->count()]);
    }

    /**
     * 更新收藏数
     */
    public function updateCountMark()
    {
        $this->updateAttributes(['count_mark' => QuestionMark::find()->where(['question_id' => $this->id])->count()]);
    }

    public function getFollow()
    {
        return $this->hasOne(QuestionFollow::className(), ['question_id' => 'id'])->andWhere(['user_id' => \Yii::$app->user->id]);
    }

    public function getMark()
    {
        return $this->hasOne(QuestionMark::className(), ['question_id' => 'id'])->andWhere(['user_id' => \Yii::$app->user->id]);
    }

    public function updateCountAnswer()
    {
        $this->updateAttributes(['count_answer' => Answer::find()->where(['question_id' => $this->id])->count()]);
    }
}
