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
            $table->bigInteger('user_id')->unsigned();
            $table->double('price')->nullable()->unsigned();
            $table->boolean('is_status')->default(0);
            $table->string('name');
            $table->boolean('is_active')->default(0);
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('model_id')->unsigned();
            $table->smallInteger('manufactured')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('seat')->nullable();
            $table->string('registration_type')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('transmission')->nullable();
            $table->string('power_horse')->nullable();
            $table->smallInteger('doors')->nullable()->unsigned();
            $table->string('color')->nullable();
            $table->string('current_mileage')->nullable();


            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
