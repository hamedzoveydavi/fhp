<?php

namespace App\Http\Controllers;

use App\ContractServices;
use function foo\func;
use Illuminate\Http\Request;
use App\minGroundTime;
use App\Contract;
use DB;

class ContractServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $dd = Contract::where('ContractNum',$_GET['ContractNum'])->first();
        $Mid = minGroundTime::where('ContractNum',$dd->ContractNum)->orderBy('id','desc')->get();
        return view('layouts.includes.Contract.ContractServices',['data'=>$dd,'MGTdata'=>$Mid]);

    }

    public function fetch_data(){

        $dd = Contract::where('ContractNum',$_GET['ContractNum'])->first();
          $Mid = minGroundTime::where('ContractNum',$dd->ContractNum)->get();
            $sid = ContractServices::where('ContractNum',$dd->ContractNum)->get();

        return view('layouts.includes.Contract.tbl',['sdata'=>$sid,'data'=>$dd,'Mingt'=>$Mid]);

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
        $data = new ContractServices();

        $countser = ContractServices::where('Minid',$request->input('Minid'))->where('ServiceName',$request->input('ServiceSymbol'))->select(1)->count();
        if($countser == 0){

        $data->ContractNum =$request->input('ContractNum_');
        $data->Minid=$request->input('Minid');
        $data->ServiceName =$request->input('ServiceSymbol');
        $data->DeviceUnit =$request->input('Device_Unit');
        $data->BasePay =$request->input('BasePay');
        $data->CurrencyUnit =$request->input('Currencyـunit');
        $data->Total =$request->input('Total');
        $IntBasePay =str_replace(',','',$request->input('BasePay')) ;
        $data->SumTotal = $IntBasePay * $request->input('Total');
        if($data->save()) {
            return back()->with('success','Contract Services saved successfully!');
                   }else {
            return back()->withErrorMessage(__('msg.Error'));
          }
        }else{
            return back()->with('Duplicate','This Services Already Exist , Please ! Try Again..');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContractServices  $contractServices
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = ContractServices::where('id',$_GET['id'])->first();
        return view('layouts.includes.Contract.ContractServices',['dservice'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContractServices  $contractServices
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractServices $contractServices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContractServices  $contractServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ContractServices::where('id',$request->input('id'))->first();

        $data->ServiceName =$request->input('ServiceSymbol');
        $data->DeviceUnit =$request->input('Device_Unit');
        $data->BasePay =$request->input('BasePay');
        $data->CurrencyUnit =$request->input('Currencyـunit');
        $data->Total =$request->input('Total');
        $IntBasePay =str_replace(',','',$request->input('BasePay')) ;
        $data->SumTotal = $IntBasePay * $request->input('Total');

        if($data->update()){
            return back()->with('success','Contract Services Updated successfully!');
           // return redirect()->route('ctitem')->withSuccessMessageUpdate(__('msg.Success_update'));
        } else {
            return back()->withErrorMessage(__('msg.Error'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContractServices  $contractServices
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

        $data = ContractServices::where('id',$_GET['serid'])->first();

        if($data->delete()){
            return redirect()->route('ctitem')->withSuccessMessage(__('msg.Success'));
        } else {
            return back()->withErrorMessage(__('msg.Error'));
        }
    }
}
