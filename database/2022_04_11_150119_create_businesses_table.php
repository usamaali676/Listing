<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('cat_id');
            $table->string('name');
            $table->text('description');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('sms')->nullable();
            $table->string('fb')->nullable();
            $table->string('inst')->nullable();
            $table->string('gmb')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('youtube')->nullable();
            $table->string('yelp')->nullable();
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('businesses');
    }
}
