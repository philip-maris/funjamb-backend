<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSystem extends Model
{
    use HasFactory;

    protected $table="payment_systems";
    protected $primaryKey="paymentSystemId";

    protected $fillable=[
        "paymentSystemType",
        "paymentSystemUrl",
        "paymentSystemKey",
        "paymentSystemStatus",
    ];
}
