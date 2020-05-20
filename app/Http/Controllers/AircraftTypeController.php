<?php

namespace App\Http\Controllers;

use App\AircraftType;
use Illuminate\Http\Request;

class AircraftTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl = AircraftType::all();
        return view('layouts.includes.BaseInfo.AircraftTypeList',['data'=>$tbl]);
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
        $tbl = new AircraftType();
        $tbl->Type = $request->input('Type');
        $tbl->SubGroup = $request->input('SubGroup');
        if($tbl->save()){
        return back()->with('success','Aircraft Type Saved successfully!');
            }else{
        return back()->with('error','Woops , Something is Worng');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $tbl = AircraftType::where('id',$_GET['id'])->first();
        return view('layouts.includes.BaseInfo.AircraftType',['data'=>$tbl]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function edit(AircraftType $aircraftType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tbl = AircraftType::where('id',$request->input('id'))->first();
        $tbl->Type = $request->input('Type');
        $tbl->SubGroup = $request->input('SubGroup');
        if($tbl->update()){
            return back()->with('success','Aircraft Type Updated successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AircraftType $aircraftType)
    {
        //
    }
}
