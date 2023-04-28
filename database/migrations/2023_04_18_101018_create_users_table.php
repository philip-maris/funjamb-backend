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
        Schema::create('DP_USERS', function (Blueprint $table) {
            $table->id("userId");
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('score')->default(0);
            $table->string('password')->default(0);
            $table->integer('lexisScore')->default(0);
            $table->integer('comprehensionScore')->default(0);
            $table->integer('oralScore')->default(0);
            $table->timestamp('lastPlayedAt')->nullable();
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
        Schema::dropIfExists('DP_USERS');
    }
};
