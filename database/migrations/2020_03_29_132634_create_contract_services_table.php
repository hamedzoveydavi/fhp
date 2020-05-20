<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ContractNum',20)->nullable(false);
            $table->integer('Minid')->nullable(false);
            $table->string('ServiceName',10)->nullable(false);
            $table->string('DeviceUnit',10)->nullable(false);
            $table->integer('BasePay')->nullable(false);
            $table->string('CurrencyUnit',5)->nullable(false);
            $table->integer('Total')->nullable(false);
            $table->integer('SumTotal')->nullable(false);
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
        Schema::dropIfExists('contract_services');
    }
}
