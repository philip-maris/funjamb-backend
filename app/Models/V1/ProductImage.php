<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = "product_images";

    protected $primaryKey = "productImageId";

    protected $fillable =[
        "productImageProductId",
        "productImageUrl",
        "productImageStatus"
    ];


}
