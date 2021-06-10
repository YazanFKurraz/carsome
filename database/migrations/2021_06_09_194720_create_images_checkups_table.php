<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_checkups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->bigInteger('car_id')->unsigned();
            $table->integer('checkup_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('checkup_id')->references('id')->on('checkups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_checkups');
    }
}
