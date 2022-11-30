<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('paymentId');
            $table->foreignId('paymentCustomerId')
                ->constrained('customers', 'customerId');
            $table->foreignId('paymentOrderId')
                ->constrained('orders', 'orderId');
            $table->decimal('paymentAmount')->nullable();
            $table->string('paymentReference')->nullable();
            $table->foreignId("paymentPaymentSystemId")
                ->constrained("payment_systems", "paymentSystemId");
            $table->string('paymentStatus')->default("Active");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_systems');
    }
};
