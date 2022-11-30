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
        Schema::create('carts', function (Blueprint $table) {
            $table->id("cartId");
            $table->foreignId("cartCustomerId")
                ->constrained('customers', 'customerId');
            $table->foreignId("cartProductId")
                ->constrained('products', 'productId');
            $table->integer("cartQuantity")->default(1);
            $table->decimal("cartTotalAmount")->default(0);
            $table->string("cartStatus")->default("Active");
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
        Schema::dropIfExists('carts');
    }
};
