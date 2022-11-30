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
        Schema::create('orders', function (Blueprint $table) {
            $table->id("orderId");
            $table->foreignId("orderCustomerId")
                    ->constrained('customers', 'customerId');
            $table->foreignId("orderDeliveryId")
                    ->constrained('deliveries', 'deliveryId');
            $table->decimal("orderTotalAmount")->default(0);
            $table->string("orderReference")->nullable();
            $table->string("orderDeliveryEstimatedDate")->nullable();
            $table->string("orderTrackingCode")->nullable();
            $table->string("orderDeliveryStatus")->default("Pending");
            $table->foreignId("orderPaymentSystemId")
                ->constrained("payment_systems", "paymentSystemId");
            $table->decimal("orderSubTotalAmount")->default(0);
            $table->string("orderStatus")->default("Active");
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
        Schema::dropIfExists('orders');
    }
};
