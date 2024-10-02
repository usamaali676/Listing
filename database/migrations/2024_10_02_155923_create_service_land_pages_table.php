<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceLandPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_land_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_page_id');
            $table->string('service_title')->nullable();
            $table->text('service_description')->nullable();
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
        Schema::dropIfExists('service_land_pages');
    }
}
