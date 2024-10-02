<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerLandPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_land_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_page_id');
            $table->string('heading');
            $table->string('subheading');
            $table->string('heading_color');
            $table->boolean('subheading_color')->default(0);
            $table->string('desktop_image');
            $table->string('mobile_image');
            $table->foreign('land_page_id')->references('id')->on('landing_pages')->onDelete('cascade');
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
        Schema::dropIfExists('banner_land_pages');
    }
}
