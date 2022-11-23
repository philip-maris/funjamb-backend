<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $primaryKey = 'wishlistId';

    protected $fillable =[
        'wishlistProductId',
        'wishlistStatus',
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class,'wishlistProductId', 'productId');
    }
}
