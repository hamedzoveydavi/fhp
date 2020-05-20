<?php

namespace App\Http\Controllers;

use App\ContractServices;
use App\Services;
use Illuminate\Http\Request;
use App\Contract;
use App\minGroundTime;
use DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if($request->ajax()){
            $data =  array(
              'ContractNum'  => $request->input('ContractNum_'),
              'GrountTime_id' => $request->input('GrountTime_id'),
              'Service' => $request->input('ServiceSymbol'),
              'Unit' => $request->input('Device_Unit'),
              'BasePay' => $request->input('BasePay'),
              'Currency' => $request->input('Currencyـunit'),
              'Total'  => $request->input('Total'),
              'SumTotal' => str_replace(',','',$request->input('BasePay'))

            );
            $id = DB::table('contract_services')->insert($data);
            if($id > 0 ){
                echo '<div class="alert alert-success"> Data Inserted successfully</div>';
            }
        }*/
        /*----------------------------------------------------*/

       

    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()) {
            $data =Services::where('id', $request->id)->first();
            if ($data->delete()){
                echo '<div class="alert alert-success">Data Deleted successfully</div>';
            }

        }
    }
}
