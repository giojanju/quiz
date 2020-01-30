<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuizTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function createNewQuiz()
    {
        $factory = factory(Quiz::class)->raw();

        foreach (range(1, $factory['question_size']) as $key => $value) {
            $factory['questions'][$key] = factory(Question::class)->raw();
        }

        $response = $this->post('/api/quizzes/create', $factory);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'data' => true,
        ]);
    }

    /** @test */
    public function checkIfExistsType()
    {
        $this->assertTrue(
            array_key_exists(Quiz::DEFAULT_TYPE, config('settings.quiz_types'))
        );
    }
}
