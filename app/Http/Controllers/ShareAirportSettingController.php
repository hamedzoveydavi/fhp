<?php

namespace App\Http\Controllers;

use App\ShareAirportSetting;
use Illuminate\Http\Request;
use DB;
use App\AircraftType;
use App\ShareLatterAirport;
use App\ArrdepInfo;



class ShareAirportSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = $_GET['id'];
        $type = AircraftType::all();
         $st = DB::select(DB::raw("(SELECT * FROM `share_latter_airports` WHERE id=$id AND id NOT IN(SELECT id_Shareletter FROM share_airport_settings WHERE id_Shareletter=$id) )"));
         $st_head = DB::select(DB::raw("( SELECT DISTINCT(`Station`) FROM `share_airport_settings` where id_Shareletter = $id)"));
         $tbl = ShareLatterAirport::where('id',$id)->first();
        $tbl_data =  ShareAirportSetting::where('id_Shareletter',$id)->get();
        return view('layouts.includes.BaseInfo.ShareAirportSetting',['data'=>$tbl,'station'=>$st,'tdata'=>$tbl_data,'TypeAc'=>$type,'Sthead'=>$st_head]);
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

        $st = $request->check_list ;
        $type = AircraftType::all();

if (!empty($st)){


        for($i= 0 ;$i<(count($st));$i++){
            foreach($type as $list){
             $tlst = $list->Type .'-'.$list->SubGroup ;
                DB::table('share_airport_settings')->insert(
                array('id_ShareLetter'=>$request->input('id'),'Station'=>$st[$i],'Type'=>$tlst));
            }
      }
      return back()->with('success','Table Created successfully!');
    }
}


    public function AircraftTypestore(Request $request){
        
        $tbl = new ShareAirportSetting;
        $id= ShareLatterAirport::where('Station',$request->input('Station'))->where('Status','1')->first();
         $tbl->id_Shareletter = $id->id;
         $tbl->Station = $request->input('Station');
        $tbl->Type = $request->input('Type');
        //$tbl->Price="";
        if($tbl->save()){
            return back()->with('success','AircraftType Saved successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }

    }


    public function ShowTotalByStationRpt(){
        $StartDate = $_POST['StartDate'];
        $EndDate=$_POST['EndDate'];
        $tbl = DB::select(DB::raw("( SELECT
        a.Station,
        sum(
       (case 
        WHEN c.Arr_No IS Null then a.price*(50/100)
        WHEN c.Dep_No IS Null THEN a.price*(50/100)
        ELSE a.price*(100/100)
        end))as price 
       FROM share_airport_settings a,
       share_latter_airports b,arrdep_infos c WHERE a.id_Shareletter=b.id AND b.status=1 
        AND c.Type=a.Type AND a.Station=c.From
        AND c.Date_ETA >= $StartDate or c.Date_ETD <= $EndDate
       GROUP BY a.Station)"));
       return view('layouts.includes.Report.ShareAirporttotalByStationRpt',['data'=>$tbl,'date1'=>$StartDate,'date2'=>$EndDate]);
    }

    public function showTotalRpt(){

        $StartDate = $_GET['date1'];
        $EndDate=$_GET['date2'];
        $Station=$_GET['Station'];

        $tbl = DB::select(DB::raw("(SELECT
        a.Station,
        c.Type,
        sum(
        (case 
         WHEN c.Arr_No IS Null then a.price*(50/100)
         WHEN c.Dep_No IS Null THEN a.price*(50/100)
         ELSE a.price*(100/100)
         end))as price 
        FROM share_airport_settings a,
        share_latter_airports b,arrdep_infos c WHERE a.id_Shareletter=b.id AND b.status=1 
         AND c.Type=a.Type AND a.Station=c.From
         AND c.From='$Station'
         AND c.Date_ETA >= $StartDate or c.Date_ETD <= $EndDate
         GROUP BY a.Station , c.Type )"));
         return view('layouts.includes.Report.ShareAirportTotalRpt',['data'=>$tbl,'date1'=>$StartDate,'date2'=>$EndDate]);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function showRpt()
    {
        $StartDate = $_GET['date1'];
       $EndDate=$_GET['date2'];
       $Station = $_GET['Station'];
       $Type = $_GET['Type'];
                       
        $tbl = DB::select(DB::raw("(SELECT 
        c.Airline,c.Arr_No,c.Dep_No,c.Reg,
        c.Type,c.Arrival,c.From,c.To,
        sum(
        (case 
        WHEN c.Arr_No IS Null then a.price*(50/100)
        WHEN c.Dep_No IS Null THEN a.price*(50/100)
        ELSE a.price*(100/100)
        end))as price 
        FROM 
        share_airport_settings a,share_latter_airports b,arrdep_infos c
        WHERE
        c.Type='$Type'
        AND
        a.Station='$Station' 
        AND
        c.Date_ETD BETWEEN '$StartDate' AND '$EndDate'
        AND
        a.id_Shareletter=b.id
        AND
        b.status=1 
        AND 
        c.Type=a.Type 
        AND
        a.Station=c.From
        GROUP BY c.Airline,c.Arr_No,c.Dep_No,c.Reg,
        c.Type,c.Arrival,c.From,c.To
        )"));
        return view('layouts.includes.Report.ShareAirportRpt',['data'=>$tbl],);
        //AND c.Date_ETA >=$this->showTotalRpt($StartDate) or c.Date_ETD <= $this->showTotalRpt($EndDate) 
        //AND c.Date_ETA >= $StartDate or c.Date_ETD <= $EndDate

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareAirportSetting $shareAirportSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$_GET['id'];
        $tbl = ShareAirportSetting::where('id',$id)->first();
        $tbl->Price = str_replace(',','',$request->input('Price'));
       if( $tbl->update()){
        
            return back()->with('success','Price Saved successfully!');
                }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShareAirportSetting  $shareAirportSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id=$_GET['id'];
        $tbl = ShareAirportSetting::where('id',$id)->first();
        if($tbl->delete()){
            return back()->with('success','Price Deleted successfully!');
                }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }
}
