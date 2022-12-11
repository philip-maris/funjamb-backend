<?php

namespace App\Http\Requests\V1\Api\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBrandRequest extends FormRequest
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
            'brandName'=>['required', 'string', Rule::unique('brands')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })]
        ];
    }

}
