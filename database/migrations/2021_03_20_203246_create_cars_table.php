<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('is_active');
            $table->bigInteger('brand_id')->unsigned();;
            $table->bigInteger('model_id')->unsigned();;
            $table->smallInteger('manufactured');
            $table->string('fuel_type');
            $table->string('seat');
            $table->string('registration_type');
            $table->string('engine_capacity');
            $table->string('transmission');
            $table->string('color');
            $table->string('current_mileage');

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');

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
        Schema::dropIfExists('cars');
    }
}
