<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PersonalityTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPersonalityScore()
    {
        $testCase1=   '{"email":"test1@test.com","answers":[{"score":4,"question_id":1},{"score":3,"question_id":2},{"score":1,"question_id":3},{"score":6,"question_id":4},{"score":7,"question_id":5},{"score":3,"question_id":6},{"score":5,"question_id":7},{"score":3,"question_id":8},{"score":6,"question_id":9},{"score":6,"question_id":10}]}';
        $response1 = $this->json('POST', '/api/personality_score', json_decode($testCase1, true));
        $result1 = $response1->getOriginalContent();
        $this->assertEquals($result1, 'ENTP');

        $testCase2=  '{"email":"test2@test.com","answers":[{"score":1,"question_id":1},{"score":5,"question_id":2},{"score":4,"question_id":3},{"score":6,"question_id":4},{"score":5,"question_id":5},{"score":2,"question_id":6},{"score":6,"question_id":7},{"score":3,"question_id":8},{"score":3,"question_id":9},{"score":2,"question_id":10}]}';
        $response2 = $this->json('POST', '/api/personality_score', json_decode($testCase2, true));
        $result2 = $response2->getOriginalContent();
        $this->assertEquals($result2, 'ESTJ');

        $testCase3=  '{"email":"test3@test.com","answers":[{"score":3,"question_id":1},{"score":2,"question_id":2},{"score":6,"question_id":3},{"score":1,"question_id":4},{"score":7,"question_id":5},{"score":3,"question_id":6},{"score":2,"question_id":7},{"score":5,"question_id":8},{"score":2,"question_id":9},{"score":7,"question_id":10}]}';
        $response3 = $this->json('POST', '/api/personality_score', json_decode($testCase3, true));
        $result3 = $response3->getOriginalContent();
        $this->assertEquals($result3, 'INFP');

        $testCase4=  '{"email":"test4@test.com","answers":[{"score":3,"question_id":1},{"score":4,"question_id":2},{"score":7,"question_id":3},{"score":1,"question_id":4},{"score":2,"question_id":5},{"score":5,"question_id":6},{"score":4,"question_id":7},{"score":3,"question_id":8},{"score":2,"question_id":9},{"score":6,"question_id":10}]}';
        $response4 = $this->json('POST', '/api/personality_score', json_decode($testCase4, true));
        $result4 = $response4->getOriginalContent();
        $this->assertEquals($result4, 'ISFP');

        $testCase5=  '{"email":"test5@test.com","answers":[{"score":4,"question_id":1},{"score":4,"question_id":2},{"score":4,"question_id":3},{"score":4,"question_id":4},{"score":4,"question_id":5},{"score":4,"question_id":6},{"score":4,"question_id":7},{"score":4,"question_id":8},{"score":4,"question_id":9},{"score":4,"question_id":10}]}';
        $response5 = $this->json('POST', '/api/personality_score', json_decode($testCase5, true));
        $result5 = $response5->getOriginalContent();
        $this->assertEquals($result5, 'ESTJ');


        $testCase6=  '{"email":"test6@test.com","answers":[{"score":1,"question_id":1},{"score":1,"question_id":2},{"score":1,"question_id":3},{"score":1,"question_id":4},{"score":1,"question_id":5},{"score":1,"question_id":6},{"score":1,"question_id":7},{"score":1,"question_id":8},{"score":1,"question_id":9},{"score":1,"question_id":10}]}';
        $response6 = $this->json('POST', '/api/personality_score', json_decode($testCase6, true));
        $result6 = $response6->getOriginalContent();
        $this->assertEquals($result6, 'ISTJ');

        $testCase7=  '{"email":"test7@test.com","answers":[{"score":7,"question_id":1},{"score":7,"question_id":2},{"score":7,"question_id":3},{"score":7,"question_id":4},{"score":7,"question_id":5},{"score":7,"question_id":6},{"score":7,"question_id":7},{"score":7,"question_id":8},{"score":7,"question_id":9},{"score":7,"question_id":10}]}';
        $response7 = $this->json('POST', '/api/personality_score', json_decode($testCase7, true));
        $result7 = $response7->getOriginalContent();
        $this->assertEquals($result7, 'ESTP');

        
    }
}
