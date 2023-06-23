<?php

namespace App\Http\Requests\V1\Web\Staff;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
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
            'staffEmail'=>['required', 'email', 'max:255'],
            'staffFirstName'=>['required', 'max:255'],
            'staffLastName'=>['required', 'max:255'],
            'staffPhoneNo'=>['required', 'max:255'],
        ];
    }
}
