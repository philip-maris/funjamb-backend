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
        Schema::create('DP_QUESTIONS', function (Blueprint $table) {
            $table->id("questionId");
            $table->string('question')->nullable();
            $table->string('instruction')->nullable();
            $table->string('questionType')->nullable();
            $table->string('optionA')->nullable();
            $table->string('optionB')->nullable();
            $table->string('optionC')->nullable();
            $table->string('optionD')->nullable();
            $table->string('answer')->nullable();
            $table->string('questionStatus')->default("ACTIVE");
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

        Schema::create('DP_QUESTIONS', function (Blueprint $table) {
            $table->id("questionId");
            $table->string('question')->nullable();
            $table->string('instruction')->nullable();
            $table->string('questionType')->nullable();
            $table->string('optionA')->nullable();
            $table->string('optionB')->nullable();
            $table->string('optionC')->nullable();
            $table->string('optionD')->nullable();
            $table->string('answer')->nullable();
            $table->string('questionStatus')->default("ACTIVE");
            $table->timestamps();
        });
    }
};
