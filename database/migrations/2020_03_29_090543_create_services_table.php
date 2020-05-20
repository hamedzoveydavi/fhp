<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ServiceName',30)->nullable(false);
            $table->string('ServiceSymbol',10)->nullable(false);
            $table->timestamps();
        });

        $this->InsertIntoService('Ground Power Unit','Gpu');
        $this->InsertIntoService('Lavatory service Unit','Lsu');
        $this->InsertIntoService('Water Service Unit','Wsu');
        $this->InsertIntoService('Pax Couch','Bus');
        $this->InsertIntoService('AirCondition Unit','Acu');
        $this->InsertIntoService('Push Back','Push Back');
        $this->InsertIntoService('Passenger Step ','Pax Step');
    }

    private function InsertIntoService($arr1,$arr2){
        DB::table('services')->insert(
            array(
                'ServiceName' =>$arr1
                 ,'ServiceSymbol'=>$arr2
            )
        );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
