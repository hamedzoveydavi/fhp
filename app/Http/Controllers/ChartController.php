<?php

namespace App\Http\Controllers;

use App\Charts\AirlineChart;
use App\Charts\UserChart;
use Illuminate\Http\Request;
use App\ArrdepInfo;
use Charts;
use DB;

class ChartController extends Controller
{
    public function ChartTest(){

           /* $chart = ArrdepInfo(Airline::all(), 'bar', 'highcharts')*/
             /*$airline=ArrdepInfo::select('select Airline from ArrdepInfo');*/
              /*ArrdepInfo('Airline')->all();*/


   /*     $airline = ArrdepInfo::where ('status','1')->select('Airline')->get();
                 $chart= Charts::database($airline,'bar','highcharts')
            ->titel("Airline")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('Airline');
        /*return view('ChartTest', ['chart' => $chart]);*/
       // return view('ChartTest', compact('chart'));*/
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $usersChart = new UserChart;
        $usersChart->minimalist(true);
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'bar', [10, 25, 13])
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        return view('users', [ 'usersChart' => $usersChart ] );

       /* $usersChart = new AirlineChart();
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('users', [ 'usersChart' => $usersChart ] );*/
        /*return view('layouts.includes.Report.Chart.ChartTest', [ 'usersChart' => $usersChart ] );*/
    }
}
