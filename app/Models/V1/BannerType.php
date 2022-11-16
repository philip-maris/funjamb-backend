<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerType extends Model
{
    use HasFactory;
    protected $table ="banner_types";
    protected $primaryKey ="bannerTypeId";

    protected $fillable=[
        "bannerTypeName",
        "bannerTypeStatus",
    ];

    public function banners(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Banner::class, "bannerBannerTypeId", "bannerId");
    }
}
