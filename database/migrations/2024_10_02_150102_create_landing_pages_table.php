<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->string('title');
            $table->string('slug');
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('google_map')->nullable();
            $table->string('address');
            $table->boolean('about_check')->default(1);
            $table->text('about_us')->nullable();
            $table->boolean('content_check')->default(1);
            $table->text('content')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('form_check')->default(1);
            $table->boolean('video_check')->default(1);
            $table->boolean('service_check')->default(1);
            $table->boolean('testimonial_check')->default(1);
            $table->boolean('gallery_check')->default(1);
            $table->boolean('feature_check')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_pages');
    }
}
