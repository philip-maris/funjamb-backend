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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id("deliveryId");
            $table->string("deliveryState")->nullable();
            $table->decimal("deliveryFee")->nullable();
            $table->longText("deliveryDescription")->nullable();
            $table->longText("deliveryTown")->nullable();
            $table->string("deliveryStatus")->default("Active");
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
        Schema::dropIfExists('deliveries');
    }
};
