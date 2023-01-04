<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Delivery extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'deliveries';
    protected $primaryKey ='deliveryId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'deliveryState',
        'deliveryStatus',
        'deliveryFee',
        'deliveryTown',
        'deliveryDescription',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'orderDeliveryId', 'deliveryId');
    }
}
