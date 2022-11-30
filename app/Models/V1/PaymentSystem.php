<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentSystem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="payment_systems";
    protected $primaryKey="paymentSystemId";

    protected $fillable=[
        "paymentSystemType",
        "paymentSystemUrl",
        "paymentSystemKey",
        "paymentSystemStatus",
    ];
}
