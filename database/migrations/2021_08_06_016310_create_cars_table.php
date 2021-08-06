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
            $table->id();
            $table->integer('kilometers')->default(0);
            $table->string('year')->nullable();
            $table->integer('price')->default(0);
            $table->boolean('activation')->default(true);
            $table->boolean('warranty')->default(true);
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->integer('number_of_doors')->default(0);
            $table->string('number_of_cylinders')->nullable();
            $table->string('hours_power')->nullable();
            $table->bigInteger('transmission_type_id')->unsigned();
            $table->bigInteger('body_type_id')->unsigned();
            $table->bigInteger('fuel_type_id')->unsigned();
            $table->timestamps();
            $table->foreign('transmission_type_id')->references('id')->on('transmission_types');
            $table->foreign('body_type_id')->references('id')->on('body_types');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
        });

        Schema::create('car_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('title');
            $table->string('specs');
            $table->text('additional_information');
            $table->unique(['car_id','locale']);
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
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
