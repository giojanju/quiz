<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApplicantStore;
use App\Models\Applicant;
use App\Models\Quiz;

class ApplicantController
{
    public function create(ApplicantStore $request)
    {
        $data = $request->validated();

        $quiz = Quiz::findOrFail($data['quiz_id']);

        $defaultQuestionSize = config('settings.question_size', 10);
        $defaultQuestionSize = data_get($quiz, 'question_size', $defaultQuestionSize);

        if (count($data['result']) != $defaultQuestionSize) {
            return response()->json([
                'messages' => 'The given data was invalid.',
                'errors' => [
                    'questions' => 'The questions size must be ' . $defaultQuestionSize,
                ]
            ], 422);
        }

        $data = tap(Applicant::create($data));

        return response()->json(['success' => true, 'data' => $data], 201);
    }

    public function single(Applicant $applicant)
    {
        return response()->json(['success' => true, 'data' => $applicant->load('quiz.questions')]);
    }
}
