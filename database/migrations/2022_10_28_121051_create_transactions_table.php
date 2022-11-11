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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transactionId');
            $table->foreignId('transactionCustomerId')
                ->constrained('customers', 'customerId');
            $table->foreignId('orderId')
                ->constrained('orders', 'orderId');
            $table->string('transactionAmount')->nullable();
            $table->string('transactionReference')->nullable();
            $table->string('transactionPaymentSystemId')->nullable();
            $table->string('transactionPaymentMethod')->nullable();
            $table->string('transactionStatus')->default("ACTIVE");
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
        Schema::dropIfExists('transactions');
    }
};
