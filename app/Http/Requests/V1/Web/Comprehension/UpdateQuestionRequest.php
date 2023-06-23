<?php

namespace App\Http\Requests\V1\Api\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'questionId'=>['required'],
            'question'=>['required', 'string'],
            'instruction'=>['required', 'string'],
            'questionType'=>['required', 'string'],
            'optionA'=>['required', 'string'],
            'optionB'=>['required', 'string'],
            'optionC'=>['required', 'string'],
            'optionD'=>['required', 'string'],
            'answer'=>['required', 'string'],
            'questionStatus'=>['required', 'string'],
        ];
    }
}
