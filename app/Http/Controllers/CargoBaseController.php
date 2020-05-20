<?php

namespace App\Http\Controllers;

use App\CargoBase;
use Illuminate\Http\Request;

class CargoBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl = CargoBase::all();
        return view('layouts.includes.BaseInfo.CargoBaseInfo',['data'=>$tbl]);
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
        $tbl = new CargoBase();

        $tbl->minkg = $request->input('minkg');
        $tbl->maxkg = $request->input('maxkg');
        $pir  =str_replace(',','',$request->input('price')) ;
        $tbl->price = $pir ;
        $tbl->Currency_Unit = $request->input('Currency_Unit');

        if($tbl->save()){
            //return back()->with('success','Cargo Base Info Saved successfully!');
            return redirect()->route('CargoBase')->withSuccessMessage(__('msg.Success'));

        }else{
            return back()->with('errors','Woops , Something is Worng');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CargoBase  $cargoBase
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tbl = CargoBase::where('id',$_GET['id'])->first();
        return view('layouts.includes.BaseInfo.CargoBaseInfo',['datareq'=>$tbl]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CargoBase  $cargoBase
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $tbl = CargoBase::where('id',$request->input('id'))->first();
        $tbl->minkg = $request->input('minkg');
        $tbl->maxkg = $request->input('maxkg');
        $pir  =str_replace(',','',$request->input('price')) ;
        $tbl->price = $pir ;
        $tbl->Currency_Unit = $request->input('Currency_Unit');
        if($tbl->update()){
            return redirect()->route('CargoBase')->withSuccessMessageUpdate(__('msg.Success_update'));
        }else{
            return back()->with('errors','Woops , Something is Worng');

        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CargoBase  $cargoBase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CargoBase $cargoBase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CargoBase  $cargoBase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tbl = CargoBase::where('id',$_GET['id'])->first();
        if($tbl->delete()){

            return redirect()->route('CargoBase')->withSuccessMessageDelete(__('msg.Success_delete'));
        }else{
            return back()->with('errors','Woops , Something is Worng');

        }

    }
}
