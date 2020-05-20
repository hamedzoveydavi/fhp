<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_bases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('minkg')->nullable(false);
            $table->integer('maxkg')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->string('Currency_Unit',7)->nullable(false);
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
        Schema::dropIfExists('cargo_bases');
    }
}
