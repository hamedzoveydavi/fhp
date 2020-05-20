<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl = Station::all();
        return view('layouts.includes.BaseInfo.StationList',['data'=>$tbl]);
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
        $tbl = new Station;
        $tbl->StationName=$request->input('StationName');
        $tbl->Symbol = $request->input('Symbol');

        if($tbl->save()){
            return back()->with('success','Station Saved successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tbl = Station::where('id',$_GET['id'])->first();
        return view('layouts.includes.BaseInfo.Station',['data'=>$tbl]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tbl = Station::where('id',$request->input('id'))->first();
        $tbl->StationName=$request->input('StationName');
        $tbl->Symbol = $request->input('Symbol');

        if($tbl->update()){
            return back()->with('success','Station Updated successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
    }
}
