<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\ConfirmmUser;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ConfirmmUserController extends Controller
{
    private $uid = '';
    private $acc = "";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nu =  DB::select(DB::raw("(select * from profiles where userid not IN (select userid from accessories))"));
        return view ('layouts.includes.Access.ConfirmUsers',['newusers'=> $nu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            $forSysAdmin = ['Home','ViewPlan','Account','ConfirmUser','Form','PlanInfo','BasicRate',
            'CreateFlight','DelayForm','ViewFlight','plan','FlightInfo',
            'WorkOrder','FlightClose','Editors','StatusFlight',
            'Reports','Chart','Report','UserProfileList','Admin',
                'AccListNotAdded','Contract','ContractForm',
                'ContractItem','BaseInfo','CargoBase',
                'StationList','AircraftTypeList','ShareList','ShareAirortRpt','DelayTime'];

        $forCoordinator =  ['Home','Account','Form',
            'CreateFlight','DelayForm','ViewFlight','FlightInfo',
            'Editors','StatusFlight'];

        $forWorkOrder = ['ViewPlan','Account','Form','BasicRate',
            'WorkOrder','FlightClose','ViewEq'];

        $forViewRpt_Dushbord = ['ViewPlan','Account','Reports','Chart','Report','ShareAirortRpt'];

        $forViewPR =['ViewPlan','Account'];

        $forFinans=['Contract','Contractform','ContractItem','BaseInfo','CargoBase','StationList',
        'AircraftTypeList','ShareList','ShareAirortRpt','DelayTime'];


        if($this->acc == 'SysAdmin'){
            for($i = 0 ; $i<count($forSysAdmin) ; $i++){
                DB::table('accessories')->insert(
                    array('AccessoryName'=>$forSysAdmin[$i] ,'userid'=>$this->uid)); }
        }elseif ($this->acc == 'Coordinator'){
            for($i = 0 ; $i<count($forCoordinator) ; $i++){
                DB::table('accessories')->insert(
                    array('AccessoryName'=>$forCoordinator[$i] ,'userid'=>$this->uid)); }
        }elseif ($this->acc == 'ViewRpt_Dusbord'){
            for($i = 0 ; $i<count($forViewRpt_Dushbord) ; $i++){
                DB::table('accessories')->insert(
                    array('AccessoryName'=>$forViewRpt_Dushbord[$i] ,'userid'=>$this->uid)); }
        }elseif ($this->acc == 'ViewPR'){
            for($i = 0 ; $i<count($forViewPR) ; $i++){
                DB::table('accessories')->insert(
                    array('AccessoryName'=>$forViewPR[$i] ,'userid'=>$this->uid)); }
        }elseif ($this->acc == 'Workorder'){
            for($i = 0 ; $i<count($forWorkOrder) ; $i++){
                DB::table('accessories')->insert(
                    array('AccessoryName'=>$forWorkOrder[$i] ,'userid'=>$this->uid)); }

        }elseif ($this->acc == 'forFinans'){
            for($i = 0 ; $i<count($forFinans) ; $i++){
                DB::table('accessories')->insert(
                    array('AccessoryName'=>$forFinans[$i] ,'userid'=>$this->uid)); }

        }
       return $this->index();



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store()
    {
        $this->uid = $_POST['uid'];
        $this->acc = $_POST['acc'];
        $coun = ConfirmmUser::where('userid',$this->uid)->select(1)->count();

        if ($coun == 0){

            $cm = new ConfirmmUser();
            $cm->userid =$this->uid; /*$_POST['uid'];*/
            $cm->profileid =$_POST['pid'];
            $cm->confirm = '1';
            $cm->accessory = $this->acc ;

            if($cm->save()){
               return $this->create();
            }else{
                return back()->with('errors','Woops , Something is Worng');
            }
        }else{
            return back()->with('Duplicate','This record has already been saved, it is a duplicate record !! ');

        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ConfirmmUser  $confirmmUser
     * @return \Illuminate\Http\Response
     */
    public function show(ConfirmmUser $confirmmUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConfirmmUser  $confirmmUser
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $uid = $_GET['uid'];
        $tbl = ConfirmmUser::where('userid',$uid)->first();
        $tbl->confirm = '0';

        if($tbl->update()){
            return back()->with('success', 'Grate , DeActived User SuccssesFully !!');
        } else {
            return back()->with('errors', 'Woops , Something is Worng');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConfirmmUser  $confirmmUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfirmmUser $confirmmUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConfirmmUser  $confirmmUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfirmmUser $confirmmUser)
    {
        //
    }
}
