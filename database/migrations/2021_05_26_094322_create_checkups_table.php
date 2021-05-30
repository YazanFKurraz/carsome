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
            $table->bigInteger('car_id')->unsigned();
            $table->boolean('external')->default(0);;
            $table->text('external_description')->nullable();
            $table->boolean('wheels')->default(0);;
            $table->text('wheels_description')->nullable();
            $table->boolean('engine')->default(0);;
            $table->text('engine_description')->nullable();
            $table->boolean('internal')->default(0);;
            $table->text('internal_description')->nullable();
            $table->boolean('is_accedent')->default(0);

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

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
