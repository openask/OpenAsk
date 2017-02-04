<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%map_post_topic}}".
 *
 * @property string $question_id
 * @property string $topic_id
 * @property string $uid
 * @property integer $add_time
 */
class QuestionTopic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%question_topic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'topic_id', 'uid', 'add_time'], 'required'],
            [['question_id', 'topic_id', 'uid', 'add_time'], 'integer'],
        ];
    }

    public static function add($name, $question_id, $uid)
    {
        $topic = Topic::getByName($name);
        $rel = new static([
            'question_id' => $question_id,
            'topic_id' => $topic->id,
            'uid' => $uid,
            'add_time' => time(),
        ]);
        $rel->save(false);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'Post ID',
            'topic_id' => 'Topic ID',
            'uid' => 'Uid',
            'add_time' => 'Add Time',
        ];
    }
}
