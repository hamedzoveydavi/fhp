<?php

namespace App\Http\Controllers;

use App\DelayTime;
use Illuminate\Http\Request;

class DelayTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl = DelayTime::all();
        return view('layouts.includes.BaseInfo.DelayTime',['data'=>$tbl]);
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
        $tbl = new DelayTime();
        $tbl->from = $request->input('from');
        $tbl->to = $request->input('to');
        $tbl->precent =$request->input('precent');
        if($tbl->save()){
            return back()->with('success','Delay Time Saved successfully!');
                    }else{
            return back()->with('errors','Woops , Something is Worng');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DelayTime  $delayTime
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id= $_GET['id'];
        $tbl = DelayTime::where('id',$id)->first();
        return view('layouts.includes.BaseInfo.DelayTime',['datareq'=>$tbl]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DelayTime  $delayTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DelayTime $delayTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DelayTime  $delayTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $_GET['id'];
        $tbl = DelayTime::where('id',$id)->first();
        $tbl->from = $request->input('from');
        $tbl->to = $request->input('to');
        $tbl->precent =$request->input('precent');
        if($tbl->update()){
            return back()->with('success','Delay Time Updated successfully!');
        }else{
            return back()->with('errors','Woops , Something is Worng');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DelayTime  $delayTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DelayTime $delayTime)
    {
        $id = $_GET['id'];
        $tbl = DelayTime::where('id',$id)->first();
        if($tbl->delete()){
            return back()->with('success','Delay Time Deleted successfully!');
        }else{
            return back()->with('errors','Woops , Something is Worng');
        }
    }
}
