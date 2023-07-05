<?php
namespace App\Http\Requests\prep\Api\Authentication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InitiateEnrollmentRequest extends FormRequest
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
            'firstName'=>['required', 'max:255'],
            'lastName'=>['required', 'max:255'],
            'level'=>['required', 'max:255'],
            'email'=>['required', 'max:255', Rule::unique('PREP_USERS', 'email')],
            'password'=>['required', 'max:255']
        ];
    }
}
