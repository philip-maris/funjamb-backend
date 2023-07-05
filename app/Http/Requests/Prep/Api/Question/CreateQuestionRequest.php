<?php

namespace App\Http\Requests\Prep\Api\Question;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
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
            'question'=>['required', 'string'],
            'courseCode'=>['required', 'string'],
            'A'=>['required', 'string'],
            'B'=>['required', 'string'],
            'C'=>['required', 'string'],
            'D'=>['required', 'string'],
            'answer'=>['required', 'string'],
        ];
    }
}
