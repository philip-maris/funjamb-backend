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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notificationId');
            $table->string('notificationMessage')->nullable();
            $table->string('notificationColor')->nullable();
            //foreign key for customerId
            $table->foreignId("notificationCustomerId")
                ->constrained('customers', 'customerId');
            $table->string('notificationTitle')->nullable();
            $table->string('notificationStatus')->default("Active");
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
        Schema::dropIfExists('notifications');
    }
};
