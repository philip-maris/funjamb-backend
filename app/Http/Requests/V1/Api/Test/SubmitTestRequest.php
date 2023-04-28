<?php

namespace App\Http\Requests\V1\Api\Test;

use Illuminate\Foundation\Http\FormRequest;

class SubmitTestRequest extends FormRequest
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
            'userId'=>['required', 'int'],
            'totalCorrectAnswers'=>['required', 'int'],
            'totalWrongAnswers'=>['required', 'int'],
            'score'=>['required', 'int'],
            'lexisScore'=>['required', 'int'],
            'comprehensionScore'=>['required', 'int'],
            'oralScore'=>['required', 'int'],
            'antonymsScore'=>['required', 'int'],
        ];
    }
}
