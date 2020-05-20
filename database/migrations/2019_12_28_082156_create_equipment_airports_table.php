<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_airports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Flightid');
            $table->integer('GHCN_NO');
            $table->string('BasicServices');
            $table->string('BasicRateid');
            $table->integer('CrewCare')->nullable();
            $table->integer('CrewCareTime')->nullable();
            $table->integer('PaxCoach')->nullable();
            $table->integer('PaxCoachTime')->nullable();
            $table->integer('LOM')->nullable();
            $table->integer('LOMTime')->nullable();
            $table->integer('bmc')->nullable();
            $table->integer('bmcTime')->nullable();
            $table->integer('vipcar')->nullable();
            $table->integer('vipcarTime')->nullable();
            $table->integer('wch')->nullable();
            $table->integer('wchTime')->nullable();
            $table->integer('Gpu')->nullable();
            $table->integer('GpuTime')->nullable();
            $table->integer('Acu')->nullable();
            $table->integer('AcuTime')->nullable();
            $table->integer('Asu')->nullable();
            $table->integer('AsuTime')->nullable();
            $table->integer('PushBack')->nullable();
            $table->integer('PushBackTime')->nullable();
            $table->integer('cpl')->nullable();
            $table->integer('cplTime')->nullable();
            $table->integer('Liftruck')->nullable();
            $table->integer('LiftruckTime')->nullable();
            $table->integer('TowTractor')->nullable();
            $table->integer('TowTractorTime')->nullable();
            $table->integer('towbar')->nullable();
            $table->integer('towbarTime')->nullable();
            $table->integer('Belt')->nullable();
            $table->integer('BeltTime')->nullable();
            $table->integer('Lsu')->nullable();
            $table->integer('LsuTime')->nullable();
            $table->integer('Wsu')->nullable();
            $table->integer('WsuTime')->nullable();
            $table->integer('PaxStep')->nullable();
            $table->integer('PaxStepTime')->nullable();
            $table->integer('BaggageTrailer')->nullable();
            $table->integer('BaggageTrailerTime')->nullable();
            $table->integer('CateringLift')->nullable();
            $table->integer('CateringLiftTime')->nullable();
            $table->integer('Stretcher')->nullable();
            $table->integer('StretcherTime')->nullable();
            $table->integer('ManPower')->nullable();
            $table->integer('ManPowerTime')->nullable();
            $table->integer('Chocks')->nullable();
            $table->integer('ChocksTime')->nullable();
            $table->integer('Headset')->nullable();
            $table->integer('HeadsetTime')->nullable();
            $table->integer('Deicer')->nullable();
            $table->integer('DeicerTime')->nullable();
            $table->integer('Deicefluid')->nullable();
            $table->integer('DeicefluidTime')->nullable();
            $table->string('Remark')->nullable();

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
        Schema::dropIfExists('equipment_airports');
    }
}
