<?php


namespace app\models;
use app\models\traits\VoteTrait;
use yii\db\ActiveRecord;
use app\helpers\Helper;

/**
 * Class Answer
 * @package app\models
 *
 * @property integer $id
 * @property string $body
 * @property integer $created_at
 * @property integer $author_id
 * @property integer $updated_at
 * @property integer $modified_by
 * @property integer $modified_at
 * @property integer $question_id
 * @property integer $count_comment
 * @property integer $count_view
 * @property integer $count_approve
 * @property integer $count_oppose
 * @property integer $count_follow
 * @property integer $count_thank
 * @property integer $count_mark
 * @property integer $count_no_help
 * @property integer $is_lock
 * @property integer $is_anonymous
 * @property Question $question
 */
class Answer extends ActiveRecord
{

    use PostTrait;

    use VoteTrait;

    public $is_deleted;

    public static function tableName()
    {
        return '{{%answer}}';
    }

    public function scenarios()
    {
        return [
            'default' => ['body', 'is_anonymous', '!author_id', 'question_id'],
            'update' => ['body', 'is_anonymous', 'is_deleted'],
        ];
    }

    public function rules()
    {
        return [
            [['body', 'question_id'], 'required'],

            [['body'], 'string'],
            [['created_at', 'author_id', 'updated_at'], 'required'],
            [['created_at', 'author_id', 'updated_at', 'modified_by', 'modified_at', 'question_id', 'count_comment', 'count_view', 'count_approve', 'count_oppose', 'count_follow', 'count_thank', 'count_mark', 'count_no_help', 'is_lock', 'is_anonymous', 'is_deleted'], 'integer'],
        ];
    }

    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (Helper::getOpenAskConfig('only_one_answer_per_user')) {
                if (static::find()->where([
                    'question_id' => $this->question_id,
                    'author_id' => $this->author_id,
                ])->exists()) {
                    $this->addError('body', \Yii::t('app', '这个问题您已经提交过答案'));
                    return false;
                }
            }
            $this->body = $this->sanitize($this->body);
            return true;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            $question = $this->question;
            $question->last_active = time();
            $question->last_answer_id = $this->id;
            $question->last_answer_by = $this->author_id;
            $question->save(false);

            $this->question->updateCounters(['count_answer' => 1]);

            UserActionHistory::createAnswer($this->author_id, $this);

            // 新建回答自动关注该问题
            UserActionHistory::followQuestion($this->author_id, $this->question, false, true);
        }

    }

    public function afterDelete()
    {
        // 答案删除后，更新问题回答数
        $this->question->updateCounters(['count_answer' => -1]);
    }

    public function attributeLabels()
    {
        return [
            'body' => \Yii::t('app', '内容'),
            'is_anonymous' => \Yii::t('app', '匿名'),
        ];
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['answer_id' => 'id']);
    }

    public function newComment()
    {
        return new Comment(['answer_id' => $this->id]);
    }

    public function updateCountComment()
    {
        $this->updateAttributes(['count_comment' => Comment::find()->where(['answer_id' => $this->id])->count()]);
    }
}
