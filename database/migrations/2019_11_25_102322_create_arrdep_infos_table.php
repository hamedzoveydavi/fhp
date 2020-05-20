<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrdepInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrdep_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Airline',3);
            $table->string('DateSabt',10);
            $table->string('Arr_No',5)->nullable();
            $table->string('Dep_No',5)->nullable();
            $table->string('Reg',10)->nullable();
            $table->string('Arrival',5)->nullable();
            $table->string('Type',10)->nullable();
            $table->string('From',5)->nullable();
            $table->string('To',5)->nullable();
            $table->string('ETA',4)->nullable();
            $table->string('Date_ETA',10)->nullable();
            $table->string('ETD',4)->nullable();
            $table->string('Date_ETD',10)->nullable();
            $table->string('Pos_Park',10)->nullable();
            $table->boolean('Status')->default(1);
            /*-----------------------------------------------------------*/
            $table->string('ATA',7)->nullable();
            $table->string('ChocksOn',7)->nullable();
            $table->string('ChocksOf',7)->nullable();
            $table->string('ATD',7)->nullable();
            $table->string('Hall',5)->nullable();
            $table->string('Gate',7)->nullable();
            $table->integer('ADL_Dep')->nullable();
            $table->integer('CHD_Dep')->nullable();
            $table->integer('INF_Dep')->nullable();
            $table->integer('TPD_Dep')->nullable();
            $table->integer('TBD_Dep')->nullable();
            $table->integer('VCIP_Dep')->nullable();
            $table->integer('WCH_Dep')->nullable();
            $table->integer('PaxCargoDep')->nullable();
            $table->integer('WeightCargoDep')->nullable();
            /*-----------------------------------------------------------*/
            $table->integer('TPA_ARR')->nullable();
            $table->integer('TBA_ARR')->nullable();
            $table->integer('WCH_ARR')->nullable();
            $table->integer('PaxCargoArr')->nullable();
            $table->integer('WeightCargoArr')->nullable();
            /*-----------------------------------------------------------*/
            $table->string('Coordinator',20)->nullable();
            $table->string('Remark',255)->nullable();
            /*-----------------------------------------------------------*/
            $table->string('StatusFlight',7)->nullable();
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
        Schema::dropIfExists('arrdep_infos');
    }
}
