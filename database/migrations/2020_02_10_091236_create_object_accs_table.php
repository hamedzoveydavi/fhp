<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectAccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_accs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('objectacc',20);
            $table->timestamps();
        });
        $obj = ['Home','ViewPlan','Account','ConfirmUser','Form','BasicRate',
                    'CreateFlight','DelayForm','ViewFlight','plan','FlightInfo',
                        'WorkOrder','FlightClose','Editors','StatusFlight',
                            'Reports','Chart','Report','AccListNotAdded','Admin',
                                'UserProfileList','Contract','ContractForm','ContractItem',
                                    'BaseInfo','CargoBase','StationList','AircraftTypeList',
                                    'ShareAirportList','ShareAirortRpt','DelayTime'];

        for ($i=0; $i<count($obj); $i++){
            DB::table('object_accs')->insert(
                array('objectacc' =>$obj[$i])
            );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_accs');
    }
}
