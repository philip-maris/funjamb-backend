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
        Schema::create('banners', function (Blueprint $table) {
            $table->id('bannerId');
            $table->string('bannerImage')->nullable();
            $table->text('bannerText')->nullable();
            $table->string('bannerTitle')->nullable();
            $table->text('bannerSubTitle')->nullable();
            $table->foreignId('bannerBannerTypeId')
                    ->constrained("banner_types", "bannerTypeId");
            $table->string('bannerStatus')->default("Active");
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
        Schema::dropIfExists('banners');
    }
};
