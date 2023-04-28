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
        Schema::create('DP_TESTS', function (Blueprint $table) {
            $table->id("testId");
            $table->foreignId("userId")
                ->constrained('DP_USERS', 'userId');
            $table->integer('totalCorrectAnswers')->nullable();
            $table->integer('totalWrongAnswers')->nullable();
            $table->integer('score')->nullable();
            $table->integer('password')->nullable();
            $table->integer('lexisScore')->nullable();
            $table->integer('comprehensionScore')->nullable();
            $table->integer('oralScore')->nullable();
            $table->string('testStatus')->nullable();
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
        Schema::dropIfExists('DP_TESTS');
    }
};
