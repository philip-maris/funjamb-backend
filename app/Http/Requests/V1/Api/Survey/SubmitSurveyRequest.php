<?php

namespace App\Http\Requests\V1\Api\Survey;

use Illuminate\Foundation\Http\FormRequest;

class SubmitSurveyRequest extends FormRequest
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
            'q1'=>['required', 'string'],
            'q2'=>['required', 'string'],
            'q3'=>['required', 'string'],
            'q4'=>['required', 'string'],
            'q5'=>['required', 'string'],
            'q6'=>['required', 'string'],
            'q7'=>['required', 'string'],
            'q8'=>['required', 'string'],
            'q9'=>['required', 'string'],
            'q10'=>['required', 'string'],
            'q11'=>['required', 'string'],
            'q12'=>['required', 'string'],
            'q13'=>['required', 'string'],
            'q14'=>['required', 'string'],
            'q15'=>['required', 'string'],
        ];
    }
}
