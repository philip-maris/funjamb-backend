<?php

namespace App\Http\Requests\V1\Api\PrepUser;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'userId'=>['required', 'max:255'],
            'firstName'=>['required', 'max:255'],
            'lastName'=>['required', 'max:255'],
            'totalPlayed'=>['required', 'max:255']
        ];
    }
}
