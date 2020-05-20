<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareLatterAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_latter_airports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('LatterNum',12)->nullable(false);
            $table->string('Date',10)->nullable(false);
            $table->string('Station',5)->nullable(false);
            $table->smallInteger('Status')->nullable(false);
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
        Schema::dropIfExists('share_latter_airports');
    }
}
