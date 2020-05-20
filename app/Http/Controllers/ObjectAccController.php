<?php

namespace App\Http\Controllers;

use App\ObjectAcc;
use Illuminate\Http\Request;
use DB;
use App\Profile;

class ObjectAccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pid = $_POST['perid'];
        $p =Profile::where('Percode',$pid)->select(1)->count();
         if ($p == 0){
                return back()->with('error','Woops , Not Exist This Personal Id : => '."$pid");
         }else{
             $perid =Profile::where('Percode',$pid)->first();
             $q = DB::select(DB::raw("(select objectacc from object_accs where objectacc Not IN
                 (select AccessoryName from accessories where userid =$perid->userid))"));
             return view('layouts.includes.Access.AccessObjectList',['objacc'=> $q],['uid'=>$perid->userid]);
        }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjectAcc  $objectAcc
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectAcc $objectAcc)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ObjectAcc  $objectAcc
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjectAcc $objectAcc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObjectAcc  $objectAcc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjectAcc $objectAcc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObjectAcc  $objectAcc
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjectAcc $objectAcc)
    {
        //
    }
}
