<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_business', function (Blueprint $table) {
            $table->id();
            $table->string('business_id');
            $table->foreign('business_id')->references('id')->on('businesses');
            $table->string('cat_id');
            $table->foreign('cat_id')->references('id')->on('business_categories');
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
        Schema::dropIfExists('cat_business');
    }
}
