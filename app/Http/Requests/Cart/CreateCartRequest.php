<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CreateCartRequest extends FormRequest
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
            'cartCustomerId'=>['required', 'max:255'],
            'cartProductId'=>['required', 'max:255'],
            'cartAddedQuantity'=>['required', 'max:255']
        ];
    }
}
