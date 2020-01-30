<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuizStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['nullable', 'string', Rule::in(array_keys(config('settings.quiz_types')))],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'index' => ['nullable', 'numeric'],
            'question_size' => ['nullable', 'numeric'],
            'questions.*.question' => ['required'],
            'questions.*.right_answer' => ['required'],
            'questions.*.answers' => ['required'],
        ];
    }
}
