<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use Illuminate\Http\Request;
use App\Unit;
use App\Positions;
use DB;



class ProfileController extends Controller
{

    use AuthenticatesUsers;
    protected $user;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function __construct()
    {
        Auth::check() ? Auth::user()->id : null ;
    }*/

    public function index()
    {
        $q=Profile::where('Username',Auth::user())->select(1)->count();
        if ( $q == 0 ){
            return view('layouts.includes.Access.profile');
        }else{
            return view('/home');
        }
    }
    public function ShowUserProfile(){
    $uinfo =DB::select(DB::raw("(select a.*,b.accessory,b.confirm from profiles a ,confirmm_users b WHERE a.userid=b.userid)"));

    return view('layouts.includes.Access.UserProfileList',['ui'=>$uinfo]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $q = Profile::where('Username',Auth::user()->name)->select(1)->count();
        if ($q == 0){
            $table = new Profile();

            $table->userid = Auth::user()->id ;
            $table->Username = Auth::user()->name ;
            $table->Percode = $request->input('PerCode');
            $table->Name = $request->input('Name');
            $table->Family = $request->input('Family');
            $table->Ncode = $request->input('Ncode');
            $table->Station = $request->input('Station');
            $table->Unit = $request->input('Unit');
            $table->Position = $request->input('Position');


            if ($files = $request->file('fileUpload')) {
                $destinationPath = 'User_image/'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);

                $table->Img = $profileImage;
            }

            if ($table->save()) {
              //  return redirect()->route('home');
                return view('layouts.includes.WatingToConfirm');
                           } else {
                return back()->with('errors', 'Woops , Something is Worng');
            }

        }else{
            return redirect('Profile')->with('Duplicate', '   این کاربر یک بار ثبت شده         /////         This User Is All Ready   ');
        }

    }

    public function ShowUnit(){
        $un = Unit::all();
         $pp = DB::select(DB::raw("(select PositionName from positions where Unitid in (select id from units))"));
         return view('layouts.includes.Access.Profile',['UnitsName'=>$un],['ppName'=>$pp]);
    }

    public function ShowPosition(){
         $pp = DB::select(DB::raw("(select PositionName from positions where Unitid in (select id from units))"));
        return view('layouts.includes.Access.EditProfile',['ppName'=>$pp]);
    }


     /**
     * Display the specified resource.
     *
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $un = Unit::all();
        $p = Profile::where('Username',Auth::user()->name)->get();
         return view('layouts.includes.Access.EditProfile',['user'=>$p],['UnitsName'=>$un]);
           }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       //

      }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tbl = Profile::where('Username',Auth::user()->name)->first();

        /*$tbl->PerCode =$request->input('PerCode');*/
        $tbl->Name =$request->input('Name');
        $tbl->Family =$request->input('Family');
        $tbl->Ncode =$request->input('Ncode');
        $tbl->Station =$request->input('Station');
        $tbl->Unit =$request->input('Unit');
        $tbl->Position =$request->input('Position');
        $tbl->Position =$request->input('Position');

        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'User_image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            if ($profileImage){
                $tbl->Img = $profileImage;
            }

        }

        if($tbl->update()){
            return back()->with('success', 'Grate , Updated Profile SuccssesFully !!');
        } else {
            return back()->with('errors', 'Woops , Something is Worng');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $tblp = Profile::where('userid',$id)->first();
              $tblp->delete();
        $tblu = User::where('id',$id)->first();
               if($tblu->delete()){
                   return back()->with('success', 'Grate , Deleted Profile & User SuccessesFully !!');
               }else{
                   return back()->with('errors', 'Woops , Something is Worng');
               }
    }
}


