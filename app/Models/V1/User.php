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

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'DP_USERS';
    protected $primaryKey ='userId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'phoneNo',
        'email',
        'gender',
        'avatar',
        'score',
        'lexisScore',
        'comprehensionScore',
        'oralScore',
        'lastPlayedAt',
        'password',
        'userStatus',
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
        return $this->hasMany(Wishlist::class, 'wishlistUserId', 'userId');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'orderUserId', 'userId');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class,'cartUserId', 'cartId');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class,'transactionUserId', 'transactionId');
    }


    public function subscriptions(): HasOne
    {
        return $this->hasOne(Subscription::class, 'subscriptionUserId', 'subscriptionId');
    }

    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class,'notificationUserId', 'userId');
    }

    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class,'testimonyUserId', 'testimonyId');
    }
}
