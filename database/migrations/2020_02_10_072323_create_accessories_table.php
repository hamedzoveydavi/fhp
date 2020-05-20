<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Accessory;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->string('AccessoryName',20);
            $table->timestamps();
        });
         $this->CreateAccessorisForUserAmdin(1,'ConfirmUser');
         $this->CreateAccessorisForUserAmdin(1,'Admin');
         $this->CreateAccessorisForUserAmdin(1,'FlightInfo');
         $this->CreateAccessorisForUserAmdin(1,'WorkOrder');
         $this->CreateAccessorisForUserAmdin(1,'FlightClose');
         $this->CreateAccessorisForUserAmdin(1,'Editors');
         $this->CreateAccessorisForUserAmdin(1,'StatusFlight');
         $this->CreateAccessorisForUserAmdin(1,'Reports');
         $this->CreateAccessorisForUserAmdin(1,'Chart');
         $this->CreateAccessorisForUserAmdin(1,'Report');
         $this->CreateAccessorisForUserAmdin(1,'UserProfileList');
         $this->CreateAccessorisForUserAmdin(1,'plan');
         $this->CreateAccessorisForUserAmdin(1,'ViewFlight');
         $this->CreateAccessorisForUserAmdin(1,'Home');
         $this->CreateAccessorisForUserAmdin(1,'ViewPlan');
         $this->CreateAccessorisForUserAmdin(1,'Account');
         $this->CreateAccessorisForUserAmdin(1,'ConfirmUser');
         $this->CreateAccessorisForUserAmdin(1,'Form');
         $this->CreateAccessorisForUserAmdin(1,'PlanInfo');
         $this->CreateAccessorisForUserAmdin(1,'BasicRate');
         $this->CreateAccessorisForUserAmdin(1,'CreateFlight');
         $this->CreateAccessorisForUserAmdin(1,'DelayForm');
         $this->CreateAccessorisForUserAmdin(1,'Admin');
    }

    protected function CreateAccessorisForUserAmdin($uid,$Acc)
    {
        return Accessory::create([
            'userid' => $uid,
            'AccessoryName' => $Acc
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessories');
    }
}
