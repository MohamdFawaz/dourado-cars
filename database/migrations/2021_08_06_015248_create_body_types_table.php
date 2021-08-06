<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('body_type_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('body_type_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['body_type_id','locale']);
            $table->foreign('body_type_id')->references('id')->on('body_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_types');
    }
}
