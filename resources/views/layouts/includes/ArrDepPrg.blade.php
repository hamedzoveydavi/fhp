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
     padding: 0 200px 0 30px;
     text-align:left;
     width:850px;
 }

    .ast{
        border: white 0;
        background-color: white
    }
</style>

<div id = "form_container">

    <form  method="post" action="{{ Route ('InsertFlightReq') }}" >

        @csrf
        <br>
       @include('layouts.includes.flash-message')


        @component('components.textCoor',[
               'name'=>'Airline',
               'is_insert'=>true
                ])
        @endcomponent

        @component('components.textCoor',[
         'name'=>'Arr_No',
         'is_insert'=>true

         ])
          @endcomponent

         @component('components.textCoor',[
         'name'=>'Dep_No',
         'is_insert'=>true

         ])
          @endcomponent

        @component('components.textCoor',[
       'name'=>'Reg',
       'is_insert'=>true

       ])
        @endcomponent

<?php use App\AircraftType ; $type=AircraftType::all(); ?>

<select name="Type" style="width: 50;height: 35px;margin-bottom:10px">
                      <option hidden value="" disabled selected>Select a Type</option>
                        
                            @foreach($type as $list)
                            <option > {{$list->Type}} @if(!empty($list->SubGroup))-{{$list->SubGroup}} @endif </option>
                            @endforeach
                       
                    </select>


        

        @component('components.textCoor',[
          'name'=>'ETA',
         'is_insert'=>true

          ])
        @endcomponent

        @component('components.textCoor',[
          'name'=>'Date_ETA',
          'is_Calendar'=> true,
          'is_insert'=>true

                  ])
        @endcomponent

        @component('components.textCoor',[
          'name'=>'ETD',
          'is_insert'=>true

                  ])
         @endcomponent


         @component('components.textCoor',[
          'name'=>'Date_ETD',
          'is_Calendar'=> true,
          'is_insert'=>true

         ])
         @endcomponent
<div >
    <?php use App\Profile;
    $pinfo = Profile::where('Username',Auth::user()->name)->first();
    $st = $pinfo->Station;
    ?>


    <table style="border: white 0" >
        <thead style="border: white 0">
        <th class="ast" style="padding-top: 10px;">
             @component('components.textCoor',[
              'name'=>'Arrival',
              'is_insert'=>true

      ])
       @endcomponent
        </th>
        <th class="ast" >
             @component('components.InputForFetch',[
             'name'=>'Station',
             'is_insert'=>true,
             'value'=>$st,
             'subject'=>'Station'


             ])
            @endcomponent

        </th>
        <th class="ast" style="padding-top: 10px" >
              @component('components.textCoor',[
              'name'=>'To',
              'is_insert'=>true

          ])
            @endcomponent
        </th>


        </thead>
    </table>

</div>
        @component('components.textCoor',[
       'name'=>'Pos_Park',
       'is_insert'=>true

       ])
        @endcomponent


<div style="margin-left: 300px">
    <button type="submit" class="btn" style="background-color: green">Save Flight</button>
</div>

</form>

</div>
@endsection('content')
