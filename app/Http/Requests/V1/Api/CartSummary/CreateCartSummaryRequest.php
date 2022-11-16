<?php

namespace App\Http\Requests\V1\Api\CartSummary;

use Illuminate\Foundation\Http\FormRequest;
use PHPUnit\Exception;

class CreateCartSummaryRequest extends FormRequest
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
            'cartSummaryCartId'=>['required'],
            'cartSummarySubTotal'=>['required'],
            'cartSummaryTotal'=>['required'],
            'cartSummaryVat'=>['required'],
            'cartItemQuantity'=>['required'],
        ];
    }
}
