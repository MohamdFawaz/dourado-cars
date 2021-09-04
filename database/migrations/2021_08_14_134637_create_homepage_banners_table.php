<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('homepage_banner_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('homepage_banner_id')->unsigned();
            $table->string('locale')->index();
            $table->text('title');
            $table->unique(['homepage_banner_id','locale']);
            $table->foreign('homepage_banner_id')->references('id')->on('homepage_banners')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepage_banners');
    }
}
