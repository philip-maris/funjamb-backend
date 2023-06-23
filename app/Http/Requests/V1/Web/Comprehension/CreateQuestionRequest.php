<?php

namespace App\Http\Requests\V1\Web\Comprehension;

use Illuminate\Foundation\Http\FormRequest;

class CreateComprehensionRequest extends FormRequest
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
            'instruction'=>['required', 'string'],
            'questionType'=>['required', 'string'],
            'optionA'=>['required', 'string'],
            'optionB'=>['required', 'string'],
            'optionC'=>['required', 'string'],
            'optionD'=>['required', 'string'],
            'answer'=>['required', 'string'],
        ];
    }
}
