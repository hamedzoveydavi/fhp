<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DelayFlight;
use App\ArrdepInfo;
use App\DelayCode;

class DelayFlightController extends Controller
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
    public function create(Request $request)
    {
        $code = $request->input('DelayCode');
       $dlyid = DelayCode::where('id',$code)->select(1)->count();
       if ($dlyid == 0){
           die(" Code :  $code Is Not Found");

       }else{
        $tbl = new DelayFlight();
        $tbl->flightid = $request->input('FlightID');
        $tbl->delaycode = $request->input('DelayCode');
        $tbl->delayTime = $request->input('DelayTime');
         if($tbl->save()){
            return back()->with('success','Delay Flight Saved successfully!');
                           }else{
            return back()->with('errors','Woops , Something is Worng');
        }
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $id = $_GET['id'];
        $tbl = DelayFlight::where('id',$id)->first();
         return view ('layouts.includes.DelayTimeEdit',['delayinf'=>$tbl]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $_GET['id'];
        $tbl = DelayFlight::where('id',$id)->first();
        $tbl->delaycode = $request->input('DelayCode');
        $tbl->DelayTime = $request->input('DelayTime');
        if ($tbl->update()){
            return back()->with('success','DelayFlight Uodated successfully!');
        }
        return back()->with('errors','Woops , Something is Worng');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
       $id = $_GET['id'];
        $tbl = DelayFlight::where('id',$id)->first();
        if($tbl->delete()){
            $Prg = ArrdepInfo::where('id', $tbl->flightid)->first();
            $delaydata = DelayFlight::where('flightid',$Prg->id)->get();
            return view ('layouts.includes.EditFlightInfo',['info'=>$Prg],['delayinfo'=>$delaydata]);
       }

    }


}
