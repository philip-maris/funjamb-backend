<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartSummary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "cart_summaries";
    protected $primaryKey = "cartSummaryId";

    protected $fillable =[
        'cartSummaryCartId',
        'cartSummarySubTotal',
        'cartSummaryVat',
        'cartSummaryDeliveryFee',
        'cartSummaryTotal',
        'cartSummaryStatus',
    ];

    public function carts(){
        return $this->belongsTo(Cart::class, "cartSummaryCartId", "cartId");
    }


}
