<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BmwModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmw_models', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('series')->nullable();
            $table->string('medium_images')->nullable();
            $table->string('brochure_image')->nullable();
            $table->string('brochure_id')->nullable();
            $table->string('brochure_name')->nullable();
            $table->string('background_image_mobile')->nullable();
            $table->string('background_image')->nullable();
            $table->string('link')->nullable();
            $table->boolean('m_series')->nullable();
            $table->boolean('hybrid')->nullable();
            $table->string('mapped_body_type')->nullable();
            $table->string('body_type')->nullable();
            $table->string('body_style_id')->nullable();
            $table->integer('bmw_series_id')->nullable();
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bmw_models');
    }
}
