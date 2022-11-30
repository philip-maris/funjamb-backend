<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Subscription extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'subscriptions';
    protected $primaryKey ='subscriptionId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subscriptionCustomerEmail',
        'subscriptionStatus',
    ];

    protected $casts = [
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'subscriptionCustomerId', 'customerId');
    }
}
