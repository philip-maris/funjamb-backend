<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='products';
    protected $primaryKey ='productId';

    protected  $fillable=[
        'productName',
        'productBrandId',
        'productSellingPrice',
        'productOfferPrice',
        'productImage',
        'productDescription',
        'productSlug',
        'productDiscount',
        'productQuantity',
        'productStatus'
    ];

    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'productBrandId', 'brandId');
    }


    public function categories(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'productCategoryId', 'categoryId');
    }

    public function wishLists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'wishListProductId', 'productId');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'cartProductId', 'productId');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'reviewProductId', 'productId');
    }


}
