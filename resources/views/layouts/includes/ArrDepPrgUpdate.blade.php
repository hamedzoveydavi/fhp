@extends('layouts.app')

    @section('content')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/view.css" media="all">
    <script type="text/javascript" src="js/view.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
</head>

<style>
 #form_container
 {
     background:#fff;
     border:1px solid #ccc;
     margin:0 auto ;
     padding: 0 0 0 30px;
     text-align:left;
     width:850px;
 }

</style>

<div id = "form_container">

<form method="POST" action="{{Route('Edit-flight',['id'=>$_POST['id']])}}">
    @csrf

     <div class="row" >
               <span style="padding-bottom: 8px">
                         @component('components.textCoor',[
               'name'=>'Airline',
               'is_insert'=>false,
               'value'=>$fltdata->Airline
                ])
                 @endcomponent
              </span>
     </div>

    <div class="row">
        <span style="padding-bottom: 8px">
                @component('components.textCoor',[
                'name'=>'Arr_No',
                'is_insert'=>false,
                'value'=>$fltdata->Arr_No
                ])
                 @endcomponent
        </span>
        <span style="margin-left: 15px ; padding-bottom: 8px">
                @component('components.textCoor',[
                'name'=>'Dep_No',
                'is_insert'=>false,
                'value'=>$fltdata->Dep_No
                ])
                 @endcomponent
        </span>
     </div>



    <div class="row">
        <span style="padding-bottom: 8px">
            @component('components.textCoor',[
           'is_insert'=>false,
           'name'=>'Reg',
           'value'=>$fltdata->Reg
           ])
            @endcomponent
        </span>
      <span style="margin-left: 15px ; padding-bottom:8px ">
            @component('components.textCoor',[
           'name'=>'Type',
           'is_insert'=>false,
           'value'=>$fltdata->Type
            ])
            @endcomponent
        </span>
        </div>


        <div class="row" >
            <span style="padding-bottom: 8px">
                @component('components.textCoor',[
                  'name'=>'ETA',
                  'is_insert'=>false,
                  'value'=>$fltdata->ETA
                  ])
                @endcomponent
             </span>
             <span style="margin-left: 15px ; padding-bottom: 8px">
                @component('components.textCoor',[
                  'name'=>'Date_ETA',
                  'is_Calendar'=> true,
                  'is_insert'=>false,
                  'value'=>$fltdata->Date_ETA

                          ])
                @endcomponent
            </span>
        </div>

        <div class="row" >
          <span style="padding-bottom: 8px">
                @component('components.textCoor',[
                  'name'=>'ETD',
                  'is_time'=> true,
                  'is_insert'=>false,
                  'value'=>$fltdata->ETD
                          ])
                 @endcomponent
            </span>
            <span style="margin-left: 15px ; padding-bottom: 8px">
                 @component('components.textCoor',[
                  'name'=>'Date_ETD',
                  'is_Calendar'=> true,
                  'is_insert'=>false,
                  'value'=>$fltdata->Date_ETD
                 ])
                 @endcomponent
            </span>
        </div>


        <div class="row">
             <span  style="padding-bottom: 8px">
                @component('components.textCoor',[
               'name'=>'Arrival',
               'is_insert'=>false,
               'value'=>$fltdata->Arrival
               ])
                 @endcomponent
            </span>
            <span  style="padding-bottom: 8px">
                @component('components.textCoor',[
               'name'=>'Station',
               'is_insert'=>false,
               'value'=>$fltdata->From
               ])
                @endcomponent
            </span>
             <span style="margin-left: 15px ; padding-bottom: 8px">
                @component('components.textCoor',[
                  'name'=>'To',
                  'is_insert'=>false,
                  'value'=>$fltdata->To
                  ])
                @endcomponent
             </span>
        </div>
        <div class="row">
        <span {{--style="margin-left: 15px "--}}>
            @component('components.textCoor',[
           'name'=>'Pos_Park',
           'is_insert'=>false,
           'value'=>$fltdata->Pos_Park
           ])
            @endcomponent
        </span>
        </div>



<div style="margin-left: 300px">
    <button  class="btn" style="background-color: red" >Cancel</button>
    <button type="submit" class="btn" style="background-color: green">Update</button>
</div>

<br>
@include('layouts.includes.flash-message')
</form>
</div>
@endsection('content')
