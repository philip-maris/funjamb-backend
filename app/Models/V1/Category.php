<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "categories";
    protected $primaryKey = "categoryId";

    protected $fillable =[
        "categoryName",
        "categoryStatus"
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'productCategoryId', 'categoryId');
    }
}
