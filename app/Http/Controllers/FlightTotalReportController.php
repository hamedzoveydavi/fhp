<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Connection ;
use Auth;
use App\ArrdepInfo;
use DB;


class FlightTotalReportController extends Controller
{
    public function FlightTotalBetweenDate_Fn_Rpt(){

        $StartDate=$_POST['StartDate'];
        $EndDate=$_POST['EndDate'];

        $query = DB::select(DB::raw("(
        select a.Airline,
        a.Type,
         COUNT(a.Date_ETA) as TotalArrival,
         COUNT(a.Date_ETD) as TotalDeparture ,
         (select count(1) from arrdep_infos where `StatusFlight`= 'OnTime' and `Airline`=a.`Airline` GROUP by `Airline`) as 'OnTime',
         (select count(1) from arrdep_infos where `StatusFlight`= 'InTime' and `Airline`=a.`Airline` GROUP by `Airline`) as 'InTime' ,
         Sum(a.ADL_Dep + a.CHD_Dep + a.INF_Dep) as 'TotalPaxdep',
         Sum(a.TPA_ARR ) as 'TotalPaxArr',
         Sum(a.WCH_Dep + a.WCH_ARR) as 'SSP_ARR',
         Sum(a.TBA_ARR ) as 'TBA',
         Sum(a.TBD_Dep ) as 'TBD'
         from arrdep_infos as a
         where  a.Date_ETA between '$StartDate' and '$EndDate'
         group by a.Airline,a.Type     
         )"));
         return view('layouts.includes.Report.FlightTotalRpt',['dataflight'=>$query]);
    }



}
