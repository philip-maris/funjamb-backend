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

class PrepUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'prep_users';
    protected $primaryKey ='prepUserId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'userStatus',
        'totalPlayed',
        'userOtp',
        'userOtpExpired',
        'isSuperAdmin',
        'isAdmin',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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
        return $this->userPassword;
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'wishlistPrepUserId', 'userId');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'orderPrepUserId', 'userId');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class,'cartPrepUserId', 'cartId');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class,'transactionPrepUserId', 'transactionId');
    }


    public function subscriptions(): HasOne
    {
        return $this->hasOne(Subscription::class, 'subscriptionPrepUserId', 'subscriptionId');
    }

    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class,'notificationPrepUserId', 'userId');
    }

    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class,'testimonyPrepUserId', 'testimonyId');
    }
}
