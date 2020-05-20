<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BasicRate;

class BasicRateController extends Controller
{
    public function BasicRateInsert(Request $request){

        $Eq = new BasicRate();
        $Eq->Subject = $request->input('Subject');
        $Eq->Percent = $request->input('Percent');
        if($Eq->save()){
            return back()->with('success','BasicRate Saved successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }

    public function ViewTblBasicRate(){
        $data = BasicRate::all();
        return view('layouts.includes.WorkOrder.BasicRate',['Eqdata'=>$data]);

    }

    public function show(){
        $data = BasicRate::where('id',$_GET['id'])->first();
        return view('layouts.includes.WorkOrder.BasicRate',['fetchdata'=>$data]);
    }

    public function Update(Request $request){

        $data = BasicRate::where('id', $request->input('id'))->first();
        $data->Subject = $request->input('Subject');
        $data->Percent = $request->input('Percent');
        if($data->update()){
            return redirect()->route('BasicRateView')->withSuccessMessageUpdate(__('msg.Success_update'));
        }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }
}
