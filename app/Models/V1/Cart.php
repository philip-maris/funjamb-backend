<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cart extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'carts';
    protected $primaryKey ='cartId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cartCustomerId',
        'cartProductId',
        'cartQuantity',
        'cartStatus',
    ];

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'cartCustomerId', 'customerId');
    }

    public function cartSummaries(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CartSummary::class, 'cartSummaryId', 'cartSummaryId');
    }


    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'cartProductId', 'productId');
    }


}
