<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareAirportSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_airport_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_Shareletter')->nullable(false);
            $table->string('Station',5)->nullable(false);
            $table->string('Type',10)->nullable(true);
            $table->integer('Price')->nullable(true);
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
        Schema::dropIfExists('share_airport_settings');
    }
}
