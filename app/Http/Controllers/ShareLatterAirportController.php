<?php

namespace App\Http\Controllers;

use App\ShareLatterAirport;
use Illuminate\Http\Request;



class ShareLatterAirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl = ShareLatterAirport::orderBy('id','desc')->get();
        return view('layouts.includes.BaseInfo.ShareAirportList',['data'=>$tbl]);
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

        $this->UpdateLastStatusShareLatterAirport($request->input('Station'));

        $tbl = new ShareLatterAirport;
        $tbl->LatterNum = $request->input('LatterNum');
        $tbl->Date = $request->input('Date');
        $tbl->Station = $request->input('Station');
        $tbl->Status = 1;
        if($tbl->save()){
            return back()->with('success','Latter Number Saved successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }

    public function UpdateLastStatusShareLatterAirport($station){
        $countReq = ShareLatterAirport::where('Station',$station)->orderBy('id', 'DESC')->count();
        if($countReq > 0) {
            $lastReq = ShareLatterAirport::where('Station',$station )->orderBy('id', 'desc')->first();
            $lastReq->Status = 0;
            $lastReq->update();
        }

      }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShareLatterAirport  $shareLatterAirport
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tbl = ShareLatterAirport::where('id',$_GET['id'])->first();
        return view('layouts.includes.BaseInfo.ShareLatterAirport',['data'=>$tbl]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShareLatterAirport  $shareLatterAirport
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareLatterAirport $shareLatterAirport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShareLatterAirport  $shareLatterAirport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tbl = ShareLatterAirport::where('id',$request->input('id'))->first();
        $tbl->LatterNum = $request->input('LatterNum');
        $tbl->Date = $request->input('Date');
        $tbl->Station = $request->input('Station');
        if($tbl->update()){
            return back()->with('success','Data Updated successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShareLatterAirport  $shareLatterAirport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShareLatterAirport $shareLatterAirport)
    {
        //
    }
}
