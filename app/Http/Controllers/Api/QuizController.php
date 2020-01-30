<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\QuizStore;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Arr;

class QuizController
{
    public function json()
    {
        $data = Quiz::query();

        if (request()->has('type')) {
            $data = $data->typeFilter(request('type'));
        }

        $data = $data->get();

        return response()->json(['success' => 'true', 'data' => $data]);
    }

    public function single(Quiz $quiz)
    {
        $quiz = $quiz->load(['questions' => function ($query) {
            return $query->orderBy('index');
        }]);

        return response()->json(['success' => 'true', 'data' => $quiz]);
    }

    public function create(QuizStore $request)
    {
        $data = $request->validated();

        $defaultQuestionSize = config('settings.question_size', 10);
        $defaultQuestionSize = data_get($data, 'question_size', $defaultQuestionSize);

        if (count($data['questions']) != $defaultQuestionSize) {
            return response()->json([
                'messages' => 'The given data was invalid.',
                'errors' => [
                    'questions' => 'The questions size must be ' . $defaultQuestionSize,
                ]
            ], 422);
        }

        $quiz = tap(Quiz::create(Arr::except($data, 'questions')));

        foreach (data_get($request->all(), 'questions') as $index => $question) {
            $question['quiz_id'] = $quiz->target->id;
            $question['index'] = $question['index'] ?? ++$index;

            Question::create($question);
        }

        if (empty($quiz)) {
            return response()->json(['success' => 'false'], 400);
        }

        return response()->json(['success' => 'true', 'data' => $quiz], 201);
    }
}
