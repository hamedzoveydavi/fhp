<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DelayCode;
use DB;
class DelayController extends Controller
{
    public function InsertDelay(Request $request){
        $tbl = new DelayCode();
        $tbl->DelayDesc = $request->input('DelayDesc');
        if($tbl->save()){
            return back()->with('success','Flight created successfully!');
        }else{
            return back()->with('errors','Woops , Something is Worng');
             }
    }


    public function ViewTbldelayCode(){
        $data = DelayCode::all();
        return view('layouts.includes.DelayDesc',['data'=>$data]);
    }

    public function DeleteDelayCode(){

        $req = DelayCode::where('id',$_REQUEST['id'])->select()->first();
     if($req->delete()){
         return back()->with('success','Delay Deleted successfully!');
     }else{
         return back()->with('errors','Woops , Something is Worng');
     }
    }

    public function EditDelayCode(Request $request){
        $id =$_REQUEST['id'];
        $req =  DelayCode::where('id',$id)->first();

        $req->DelayDesc = $request->input('DelayDesc');
        if($req->update()){
            return back()->with('success','Delay Update successfully!');
                    }else{
            return back()->with('errors','Woops , Something is Worng');
        }
    }

}
