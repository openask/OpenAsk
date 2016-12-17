<?php
namespace tests\codeception\unit;

use app\models\Question;
use app\models\Answer;
use app\models\VoteLog;
use app\models\UserActionHistory;

class ModelTest extends TestCase
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _after()
    {
    }

    /**
     * @depends testQuestionCreate
     * @depends testAnswerCreate
     */
    public function testVote(Question $question, Answer $answer)
    {

        $testVoteState = function ($item, $type = 'no'){
            list($vote_up, $vote_down) = $item->getVoteTypeValue();
            codecept_debug($type);
            codecept_debug($vote_up);
            $this->assertEquals($type == $vote_up ? 1 : 0, VoteLog::find()->where([
                'uuid' => $item->uuid,
                'type' => $vote_up,
            ])->count());
            $this->assertEquals($type == $vote_down ? 1 : 0, VoteLog::find()->where([
                'uuid' => $item->uuid,
                'type' => $vote_down,
            ])->count());
            $item->refresh();
            $this->assertEquals($type == $vote_up ? 1 : 0, $item->count_vote_up);
            $this->assertEquals($type == $vote_down ? 1 : 0, $item->count_vote_down);
        };

        foreach ([$question, $answer] as $item) {
            list($vote_up, $vote_down) = $item->getVoteTypeValue();
            $ret = $item->voteUp();
            $this->assertEquals(['up' => 1, 'down' => 0], $ret);
            $testVoteState($item, $vote_up);

            $ret = $item->voteUp();
            $this->assertEquals(['up' => -1, 'down' => 0], $ret);
            $testVoteState($item);

            $ret = $item->voteUp();
            $this->assertEquals(['up' => 1, 'down' => 0], $ret);
            $testVoteState($item, $vote_up);

            $ret = $item->voteDown();
            $this->assertEquals(['up' => -1, 'down' => 1], $ret);
            $testVoteState($item, $vote_down);

            $ret = $item->voteDown();
            $this->assertEquals(['up' => 0, 'down' => -1], $ret);
            $testVoteState($item);

            $ret = $item->voteUp();
            $this->assertEquals(['up' => 1, 'down' => 0], $ret);
            $testVoteState($item, $vote_up);
        }
    }

    public function testQuestionCreate()
    {
        $user = $this->user;

        $question = new Question();
        $question->load([
            'Question' => [
                'title' => '测试标题 ' . __METHOD__,
                'body' => '<p>单元测试内容</p><script>alert(1)</script><a href="http://www.qq.com/">腾讯</a>',
                'is_anonymous' => 1,
                'tagValues' => ['PHP', 'js'],
                'author_id' => 1,
                'created_at' => time(),
            ]
        ]);

        $notEmptyAttrs = array_filter($question->toArray(array_keys($question->attributes)));

        $this->assertEquals(3, count($notEmptyAttrs));

        $this->assertEmpty($question->author_id);
        $this->assertEmpty($question->created_at);

        // 之所以保存失败是因为 author_id required
        $this->assertEmpty($question->save(), '问题保存失败');

        $question->author_id = $user->id;

        $ret = $question->save();
        $this->assertTrue($ret, '问题保存成功');

        $this->assertEquals('<p>单元测试内容</p><a href="http://www.qq.com/">腾讯</a>', $question->body);

        $question->refresh();

        return $question;
    }

    /**
     * @depends testQuestionCreate
     */
    public function testAnswerCreate(Question $question)
    {
        $user = $this->user;
        $body = '<p>单元测试回答内容</p><script>alert(1)</script><a href="http://www.qq.com/">腾讯</a>';
        $answer = new Answer();
        $answer->load([
            'Answer' => [
                'author_id' => 1, // 赋值不起作用，不能指定用户ID
                'is_anonymous' => 1,
                'question_id' => $question->id,
            ]
        ]);
        $this->assertEquals(false, $answer->save());
        $this->assertEquals(null, $answer->author_id);
        $this->assertEquals(1, $answer->is_anonymous);

        $answer->body = $body;
        $answer->author_id = $user->id;

        $save = $answer->save();
        $this->assertEquals(true, $save);

        $this->assertEquals('<p>单元测试回答内容</p><a href="http://www.qq.com/">腾讯</a>', $answer->body);

        $answer->refresh();
        return $answer;
    }
}