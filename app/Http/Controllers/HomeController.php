<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArrdepInfo;
use DateTime;
 use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function view_Flight_Data(){

        $q = ArrdepInfo::where ('Date_ETA',date('20y-m-d'))->where('From',Auth::user()->Station)->orwhere('Status',0)->select('id','Airline','Arr_No','Dep_No','Reg','Type','Arrival','From','To','ETA','Date_ETA','ETD','Date_ETD','Pos_Park','Status')->orderBy('ETA')->get();
        return view('layouts.includes.ViewTblFlight',['tblflight' => $q]);
}

}
