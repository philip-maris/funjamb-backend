<?php

namespace App\Models\V1;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'customers';
    protected $primaryKey ='customerId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customerFirstName',
        'customerLastName',
        'customerPhoneNo',
        'customerEmail',
        'customerAddress',
        'customerState',
        'customerPassword',
        'customerStatus',
        'customerOtp',
        'customerOtpExpired',
        'isSuperAdmin',
        'isAdmin',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'customerPassword',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function getAuthPassword()
    {
        return $this->customerPassword;
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'wishlistCustomerId', 'customerId');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'orderCustomerId', 'customerId');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class,'cartCustomerId', 'cartId');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class,'transactionCustomerId', 'transactionId');
    }


    public function subscriptions(): HasOne
    {
        return $this->hasOne(Subscription::class, 'subscriptionCustomerId', 'subscriptionId');
    }

    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class,'notificationUserId', 'customerId');
    }

    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class,'testimonyCustomerId', 'testimonyId');
    }
}
