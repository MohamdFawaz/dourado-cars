<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanoramicCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panoramic_cars', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('panoramic_car_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('panoramic_car_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['panoramic_car_id','locale']);
            $table->foreign('panoramic_car_id')->references('id')->on('panoramic_cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panoramic_cars');
        Schema::dropIfExists('panoramic_car_translations');
    }
}
