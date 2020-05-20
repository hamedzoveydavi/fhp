<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Profile;
use App\User;
class CreateProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->string('Username',20);
            $table->integer('Percode');
            $table->string('Name');
            $table->string('Family');
            $table->string('Ncode');
            $table->string('Station');
            $table->string('Unit');
            $table->string('Position');
            $table->string('Img')->nullable();
            $table->timestamps();
        });

        /*return $this->CreateProfileUser();*/
    }

   /* public function CreateProfileUser(){
       // $useid=User::select()->first();

        DB::table('profiles')->insert(
            array(
            'userid'=> 1,
                'Username'=>"admin",
                    'Percode'=> 1,
                        'Name'=>"admin",
                            'Family'=>"admin",
                                'Ncode'=>"1",
                                     'Station'=>"center",
                                         'Unit'=>"DataControl",
                                             'Position'>"sysadmin"
                                                     ) );
                                    }*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
