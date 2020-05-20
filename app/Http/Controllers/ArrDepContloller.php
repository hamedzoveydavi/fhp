<?php

namespace App\Http\Controllers;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ArrdepInfo;
use App\DelayFlight;
use Auth;
use DB;

class ArrDepContloller extends Controller
{



    public function View_data(){

        $id = $_POST['id'];
        $prg = ArrdepInfo::where ('id',$id)-> select('id','Airline','Arr_No','Dep_No','Reg','Type','Arrival','From','To','ETA','Date_ETA','ETD','Date_ETD','Pos_Park','Status')->first();
         return view('layouts.includes.ArrDepPrgUpdate',['fltdata' => $prg]);
    }

    public function view_plan(){
        $req = Profile::where('Username',Auth::user()->name)->first();
        $station = $req->Station;
            $q = ArrdepInfo::where ('Date_ETA',date('20y-m-d'))->orwhere('Date_ETD',date('20y-m-d'))->where('From',$station)->orwhere('Status',0)->select('id','Airline','Arr_No','Dep_No','Reg','Type','From','To','ETA','Date_ETA','ETD','Date_ETD','Pos_Park','Status')->orderBy('ETA')->get();
            return view('layouts.includes.ViewPlan',['tblflight' => $q]);



    }

            public function View_data_FlightInfo(){

                $req = Profile::where('Username',Auth::user()->name)->first();
                $station = $req->Station;
                $q = ArrdepInfo::where('From',$station)->get();
                 return view('layouts.includes.ViewTblFlightInfo',['dataInfo' => $q]);
            }

                 public function delaycode($flightid){
                      $delay = "";
                      $tbl = DelayFlight::where('flightid',$flightid)->select('delaycode','DelayTime')->get();
                     foreach ($tbl as $dt){
                         $delay = $delay .'('.($dt->delaycode).'/'.($dt->DelayTime).'Min'.')';
                     }
                return $delay;
                     }

        public function view_FlightData(){
            $req = Profile::where('Username',Auth::user()->name)->first();
            $station = $req->Station;
            $q = ArrdepInfo::where ('Date_ETA',date('20y-m-d'))->where('From',$station)->get();
            return view('layouts.includes.ViewTblFlight',['tblflight' => $q]);
        }

     public function View_data_FlightInfo_EditStatus(){
        $req = Profile::where('Username',Auth::user()->name)->first();
        $station = $req->Station;
        $q = ArrdepInfo::/*where ('Date_ETA',date('20y-m-d'))->*/where('From',$station)->where('Status',0)->get();
        return view('layouts.includes.StatusFlight',['StatusFlight' => $q]);
    }


    public function view_SearchFlightData(){
        $SearchInfo= $_POST['SearchInfo'];
        $req = Profile::where('Username',Auth::user()->name)->first();
        $station = $req->Station;
        $q = ArrdepInfo::where ('Date_ETD',$SearchInfo)->orwhere('Date_ETD',$SearchInfo)->where('From',$station)->get();
        return view('layouts.includes.ViewTblFlight',['tblflight' => $q]);
    }

    public function View_data_SearchFlightInfo(){
        $SearchInfo= $_POST['SearchInfo'];
        $q = ArrdepInfo::where ('Date_ETA',$SearchInfo)->where('From',Auth::user()->Station)->get();
        return view('layouts.includes.ViewTblFlightInfo',['dataInfo' => $q]);

    }

    public function ViewDataWhenClosed(){
        $Eq = DB::select(DB::raw("(select * from arrdep_infos where Status=1 and id not in (select Flightid from equipment_airports))"));
          return view('layouts.includes.WorkOrder.ViewFlight',['data'=>$Eq]);
    }

    public function InsertFlight_FN(Request $request){

        /*$this->validator($request->all())->validate();*/

        $Prg = new ArrdepInfo();

        $Prg->Airline = $request->input('Airline');
        $Prg->DateSabt = date('d/m/20y');
         $Prg->Arr_No = $request->input('Arr_No');
         $Prg->Dep_No = $request->input('Dep_No');
         if (empty($request->input('Reg'))){
             $Prg->Reg ='--';
         }else{
             $Prg->Reg = $request->input('Reg');
         }
         if(empty($request->input('Type'))){
             $Prg->Type='--';
         }else{
             $Prg->Type = $request->input('Type');
         }
         $Prg->Arrival = $request->input('Arrival');
         $Prg->From = $request->input('Station');
         $Prg->To = $request->input('To');
         $Prg->ETA = $request->input('ETA');
         $Prg->Date_ETA = $request->input('Date_ETA');
         $Prg->ETD = $request->input('ETD');
         $Prg->Date_ETD = $request->input('Date_ETD');
         if(empty( $request->input('Pos_Park'))){
             $Prg->Pos_Park='--';
         }else{
         $Prg->Pos_Park = $request->input('Pos_Park');
         }

         $Prg->Coordinator = (Auth::user()->name);
         $Prg->Status = ('0');

         if($Prg->save()){
              return back()->with('success','Flight created successfully!');
        }else{
            return back()->with('error','Woops , Something is Worng');
        }
    }

    public function Edit_ArrdepInfo(Request $request){

        /*$this->validator($request->all())->validate();*/

        $Prg =  ArrdepInfo::where ('id',$_POST['id'])->first() ;

        $Prg->Airline = $request->input('Airline');
        $Prg->DateSabt = date('d/m/20y');
        $Prg->Arr_No = $request->input('Arr_No');
        $Prg->Dep_No = $request->input('Dep_No');
        $Prg->Reg = $request->input('Reg');
        $Prg->Type = $request->input('Type');
        $Prg->Arrival = $request->input('Arrival');
        $Prg->From = $request->input('Station');
        $Prg->To = $request->input('To');
        $Prg->ETA = $request->input('ETA');
        $Prg->Date_ETA = $request->input('Date_ETA');
        $Prg->ETD = $request->input('ETD');
        $Prg->Date_ETD = $request->input('Date_ETD');
        $Prg->Pos_Park = $request->input('Pos_Park');
        $Prg->Coordinator = (Auth::user()->name);

        if ($Prg->update()){
            return back()->with('success','Flight Edited successfully!');
           }else{
            return back()->with('errors','Woops , Something is Worng');
        }
    }

    public function Delete_ArrdepInfo(){
              $id = $_POST['id'];
              $Prg =  ArrdepInfo::where ('id',$id)->first() ;
          if ($Prg->delete()){
            return back()->with('success','Flight Removed successfully!');
        }else{
            return back()->with('errors','Woops , Something is Worng');
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Airline'=> ['required'|'string'|'min:2'| 'max:5'],
            'Arr_No'=> ['required', 'string','min:2', 'max:4'],
            'Dep_No'=> ['required', 'string','min:2', 'max:4'],
            'Reg'=> ['string','min:2', 'max:6'] ,
            'Type'=>  ['string','min:2', 'max:6'],
            'From'=>  ['required', 'string','min:2', 'max:5'],
            'To'=> ['required', 'string','min:2', 'max:3'],
            'ETA'=> ['required', 'string','min:2', 'max:5'],
            'Date_ETA'=> ['required'| 'string'|'min:4'| 'max:10'],
            'ETD'=> ['required', 'string','min:2', 'max:5'],
            'Date_ETD'=> ['required', 'string','min:2', 'max:10'],
            'Pos_Park'=> ['string','min:2', 'max:6']
        ]);
    }


    public function DateFormat($date){

        $dd = substr($date,1,4);
        $mm = substr($date,6,2);
        $yy = substr($date,9,2);
        $date_=$dd .'/'. $mm .'/'. $yy ;
        return $date_;

    }

    public function CreateFlightInfo(Request $request){

         $id = $request->input('id');
          $Prg =  ArrdepInfo::where ('id',$id )->first() ;
          $Prg->ATA = $request->input('ATA');
          $Prg->ChocksOn = $request->input('ChocksOn');
          $Prg->ChocksOf = $request->input('ChocksOf');
          $Prg->ATD = $request->input('ATD');
          $Prg->Hall = $request->input('Hall');
          $Prg->Gate = $request->input('Gate');
          $Prg->ADL_Dep = $request->input('ADL_Dep');
          $Prg->CHD_Dep = $request->input('CHD_Dep');
          $Prg->INF_Dep = $request->input('INF_Dep');
          $Prg->TPD_Dep = $request->input('TPD_Dep');
          $Prg->TBD_Dep = $request->input('TBD_Dep');
          $Prg->VCIP_Dep = $request->input('VCIP_Dep');
          $Prg->WCH_Dep = $request->input('WCH_Dep');
          $Prg->PaxCargoDep = $request->input('PaxCargoDep');
          $Prg->WeightCargoDep = $request->input('WeightCargoDep');
          $Prg->TPA_ARR = $request->input('TPA_ARR');
          $Prg->TBA_ARR = $request->input('TBA_ARR');
          $Prg->WCH_ARR = $request->input('WCH_ARR');
          $Prg->PaxCargoArr = $request->input('PaxCargoArr');
          $Prg->WeightCargoArr = $request->input('WeightCargoArr');

          $Prg->Coordinator =(Auth::user()->name);
          $Prg->Remark = $request->input('Remark');

          $DelayCalc =(($Prg->ChocksOf = $request->input('ChocksOf')) - ($Prg->ETD));
          if ($DelayCalc > 0 ){
              $Prg->StatusFlight ='Delay';
             }elseif($DelayCalc === 0){
              $Prg->StatusFlight ='OnTime';
          }else{
              $Prg->StatusFlight ='InTime';
          }

          $hasdel = DelayFlight::where('flightid',$id)->count();
         if ( $DelayCalc > 0 && $hasdel == 0 ) {
             return back()->with('delay', " این پرواز  $DelayCalc تاخیر دارد   -----   ابتدا باید تا خیر پرواز را ثبت کنید ");
         }elseif ( $DelayCalc > 0 &&  $hasdel > 0 ) {
             if ($Prg->update()) {
                 return back()->with('success', 'اطلاعت مورد نظر با موفقیت ذخیره شد ');
             }
         }elseif ( $DelayCalc == 0 &&  $hasdel == 0 ) {}
        if ($Prg->update()) {
            return back()->with('success', 'اطلاعت مورد نظر با موفقیت ذخیره شد ');
        }
         }


    public function UpdateStatusToOpen()
    {
        $id = $_GET['id'];
        $Prg = ArrdepInfo::where('id', $id)->first();
        $Prg->status = '0';
        $Prg->update();

       return back()->with('View_data_FlightInfo_EditStatus');

    }

    public function UpdateStatusToClose()
    {
        $id = $_GET['id'];
        $Prg = ArrdepInfo::where('id', $id)->first();
        $Prg->status = '1';
        $Prg->update();

        return back()->with('View_data_FlightInfo_EditStatus');

    }

    public function UpdateStatusToCancel()
    {
        $id = $_GET['id'];
        $Prg = ArrdepInfo::where('id', $id)->first();
        $Prg->status = '-1';
        $Prg->update();

        return back()->with('View_data_FlightInfo_EditStatus');
    }

    public function SelectInfoFlight(){

        $Prg = ArrdepInfo::where('id', $_GET['id'])->first();
        $delaydata = DelayFlight::where('flightid',$Prg->id)->get();

        return view ('layouts.includes.EditFlightInfo',['info'=>$Prg],['delayinfo'=>$delaydata]);

    }

    public function SelectInfoFlightForSave(){
        $Prg = ArrdepInfo::where('id', $_POST['id'])->first();
        return view ('layouts.includes.ArrDepInfo',['info'=>$Prg]);
    }


   }
