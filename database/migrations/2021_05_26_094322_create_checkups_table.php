<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('car_id')->unsigned();
            $table->smallInteger('external');
            $table->text('external_description')->nullable();
            $table->smallInteger('wheels');
            $table->text('wheels_description')->nullable();
            $table->smallInteger('engine');
            $table->text('engine_description')->nullable();
            $table->smallInteger('internal');
            $table->text('internal_description')->nullable();
            $table->boolean('is_accident')->default(0);

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
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
        Schema::dropIfExists('checkups');
    }
}
