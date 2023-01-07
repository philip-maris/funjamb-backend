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
        Schema::table('banners', function (Blueprint $table) {
            $table->dropConstrainedForeignId("bannerBannerTypeId");
            $table->string("bannerType");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->foreignId('bannerBannerTypeId')
                ->constrained("banner_types", "bannerTypeId");
            $table->dropColumn("bannerType");
        });
    }
};
