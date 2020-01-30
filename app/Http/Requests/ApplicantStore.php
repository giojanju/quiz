<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantStore extends FormRequest
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
            'quiz_id' => ['exists:quizzes,id', 'required', 'numeric'],
            'name' => ['nullable', 'string', 'min:2', 'max:255'],
            'result' => ['required'],
            'result.*.answer' => ['required'],
        ];
    }
}
