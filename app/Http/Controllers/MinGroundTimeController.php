<?php

namespace App\Http\Controllers;

use App\minGroundTime;
use Illuminate\Http\Request;
use App\Contract;
use RealRashid\SweetAlert\Facades\Alert;

class MinGroundTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.includes.Contract.ContractMinGroundTime');
    }

    public function fetch_data(Request $request){
        /*if($request->ajax()){
            $data = DB::table('min_ground_times')->orderBy('id','desc')->get();
        }
        echo json_decode($data);*/
        $cnn= Contract::where('ContractNum',$_GET['ContractNum'])->first();
        $mgt = minGroundTime::where('ContractNum',$_GET['ContractNum'])->orderBy('id','desc')->get();
        $da = 'block' ;
        return view('layouts.includes.Contract.ContractItem',['dis'=>$da,'Mingt'=>$mgt,'$cndata'=>$cnn]);
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
        $tbl = new minGroundTime();
        $tbl->ContractNum = $request->input('ContractNum');
        $tbl->Type = $request->input('Type');
        $tbl->MinGroundTime = $request->input('MinGroundTime');
        if($tbl->save()){
            $cnnum = Contract::where('ContractNum',$request->input('ContractNum'))->first();
            $mgt = minGroundTime::where('ContractNum',$request->input('ContractNum'))->orderBy('id','desc')->get();
            $da = 'block' ;
            //return redirect()->route('ContactItemShow',['dis'=>$da,'cndata'=>$cnnum,'Mingt'=>$mgt,'ContractNum'=>$cnnum->ContractNum])->withSuccessMessage(__('msg.Success'));
            return back()->with('success','Contract Services saved successfully!');
        } else {
            return back()->withErrorMessage(__('msg.Error'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\minGroundTime  $minGroundTime
     * @return \Illuminate\Http\Response
     */
    public function show(minGroundTime $minGroundTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\minGroundTime  $minGroundTime
     * @return \Illuminate\Http\Response
     */
    public function edit(minGroundTime $minGroundTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\minGroundTime  $minGroundTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, minGroundTime $minGroundTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\minGroundTime  $minGroundTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(minGroundTime $minGroundTime)
    {
        //
    }
}
