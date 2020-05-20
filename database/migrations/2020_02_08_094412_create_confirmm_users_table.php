<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ConfirmmUser;
use App\User;

class CreateConfirmmUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmm_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->integer('profileid');
            $table->smallInteger('confirm');
            $table->string('accessory',15)->nullable();
            $table->timestamps();
        });
    //return $this->createConfirmUser();
    }

   /* protected function createConfirmUser()
    {
        $useid=User::select()->first();
        DB::table('Confirmm_Users')->insert(
            array(
            'userid' => $useid->id,
            'profileid' => '1',
            'confirm' => '1',
            'accessory' => 'SysAdmin'
                    )
        );
    }*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirmm_users');
    }
}
