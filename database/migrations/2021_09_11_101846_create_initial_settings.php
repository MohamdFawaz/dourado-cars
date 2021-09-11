<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('type')->default('web');
        });

        \App\Models\Setting::query()->create(['key' => 'List Cars Page Cover Image', 'value' => '']);
        \App\Models\Setting::query()->create(['key' => 'About Us Page Cover Image', 'value' => '']);
        \App\Models\Setting::query()->create(['key' => 'Contact Us Page Cover Image', 'value' => '']);
        \App\Models\Setting::query()->create(['key' => 'Compare Page Cover Image', 'value' => '']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
