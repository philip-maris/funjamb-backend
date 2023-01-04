<?php

namespace App\Http\Requests\V1\Api\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'productName'=>['required', 'string', 'max:255'],
            'productBrandId'=>['required'],
            'productSellingPrice'=>['nullable'],
            'productOfferPrice'=>['nullable'],
            'productImages'=>['nullable'],
            'productImages.*'=>['image'],
            'productDescription'=>['required'],
            'productDiscount'=>['nullable'],
            'productQuantity'=>['required'],
            'productCategoryId'=>['required'],
        ];
    }
}
