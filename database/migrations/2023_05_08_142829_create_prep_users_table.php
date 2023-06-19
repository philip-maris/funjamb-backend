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
        Schema::create('prep_users', function (Blueprint $table) {
            $table->id("prepUserId");
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('lastPlayedAt')->nullable();
            $table->integer('totalPlayed')->default(0);
            $table->string('userOtp')->nullable();
            $table->timestamp('userOtpExpired')->nullable();
            $table->integer('isAdmin')->nullable();
            $table->integer('isSuperAdmin')->nullable();
            $table->string('userStatus')->default("ACTIVE");
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
        Schema::dropIfExists('prep_users');
    }
};
