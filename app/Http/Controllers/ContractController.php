<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use App\Http\Requests\ContractRequest;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Contract =Contract::all();
        // where('EndDate','<=',date('m-d-y'))->get();
        return view('layouts.includes.Contract.ContractList',['CnList'=>$Contract]);

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
    public function store(ContractRequest $request)
    {
        $con = new Contract();
                $con->ContractNum = $request->input('Contract_No');
                $con->AirLine= $request->input('AirLine');
                $con->Symbol= $request->input('Symbol');
                $con->StartDate= $request->input('Start_Date');
                $con->EndDate=$request->input('End_Date');
                if($con->save()){
                    return redirect()->route('ContactList')->withSuccessMessage(__('msg.Success'));
                            } else {
                    return back()->withErrorMessage(__('msg.Error'));
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Contract::where('ContractNum',$_POST['contract'])->get();
        return view('layouts.includes.Contract.ContractList',['CnList'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
