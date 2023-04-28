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
        Schema::create('dp_comprehension_questions', function (Blueprint $table) {
            $table->id("questionId");
            $table->foreignId("comprehensionId")
                ->constrained('DP_COMPREHENSION', 'comprehensionId');
            $table->string('question')->nullable();
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
        Schema::dropIfExists('dp_comprehension_questions');
    }
};
