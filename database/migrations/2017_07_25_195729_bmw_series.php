<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BmwSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmw_series', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('series_icon')->nullable();
            $table->integer('display_order')->nullable();
            $table->string('medium_images')->nullable();
            $table->string('brand')->nullable();
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
        Schema::dropIfExists('bmw_series');
    }
}
