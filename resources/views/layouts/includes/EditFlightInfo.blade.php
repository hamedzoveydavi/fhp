@extends('layouts.app')


@section('content')

<style >
    table{border: 0 solid white;}
    thead{border: 0 solid white;}
    tr{border: 0 solid white;}
    td{border: 0 solid white;}


    fieldset {
        margin: 8px;
        border: 1px solid silver;
        padding: 8px;
        border-radius: 4px;
    }

    legend {
        padding: 2px;
    }
</style>

<form method="post" action="{{Route('SaveFlightInfo')}}">
    @csrf

    <input type="text" name="id" value="{{$info->id}}"style="display: none">

    <div style="border: 1px #DCDCDC solid;border-radius: 5px;padding: 3px 0px 3px 3px;">
        <div class="divTable">
            <div class="divTableBody">
                <div class="divTableRow">
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                               'name'=>'Date'
                               ,'subject'=>'Date.Dep'
                               ,'value'=>$info->Date_ETD
                                ,'is_lock'=>true
                                ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                             'name'=>'Airline'
                             ,'subject'=>'Airline'
                             ,'value'=>$info->Airline
                              ,'is_lock'=>true
                             ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                                'name'=>'Des'
                                ,'subject'=>'Destination'
                                ,'value'=>$info->To
                                 ,'is_lock'=>true
                                 ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                                'name'=>'ETA'
                                ,'subject'=>'E.Time.A'
                                ,'value'=>$info->ETA
                                 ,'is_lock'=>true
                                 ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                                 'name'=>'ETD'
                                 ,'subject'=>'E.Time.D'
                                 ,'value'=>$info->ETD
                                  ,'is_lock'=>true
                                  ])
                        @endcomponent
                    </div>
                </div>

                <div class="divTableRow">
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                         'name'=>'Arr_No'
                         ,'subject'=>'Arrival.No'
                         ,'value'=>$info->Arr_No
                          ,'is_lock'=>true
                               ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                          'name'=>'Dep_No'
                          ,'subject'=>'Departure.No'
                          ,'value'=>$info->Dep_No
                           ,'is_lock'=>true
                               ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                          'name'=>'Reg'
                          ,'subject'=>'Reg'
                          ,'value'=>$info->Reg
                           ,'is_lock'=>true
                               ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">
                        @component('components.InputForFetch',[
                          'name'=>'Type'
                          ,'subject'=>'Type'
                          ,'value'=>$info->Type
                           ,'is_lock'=>true
                                ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20%">

                    </div>

                </div>
            </div>
        </div>
    </div><br>
    @include('layouts.includes.flash-message')

    <div style="border: 1px #1E90FF solid;border-radius: 5px">
        <div style="height: 40px;background-color: #1E90FF ;text-align: center;font:2em bold"> ARRIVAL</div>
        <div>

            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                             'name'=>'ATA',
                             'subject'=>'A.Time.A'
                             ,'value'=>$info->ATA


                              ])
                            @endcomponent

                        </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                              'name'=>'ChocksOn',
                              'subject'=>'ChocksOn'
                             ,'value'=>$info->ChocksOn

                               ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 34%">

                        </div>
                    </div>

                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%">

                            @component('components.InputForFetch',[
                                           'name'=>'TPA_ARR',
                                            'subject'=>'TPA'
                                            ,'value'=>$info->TPA_ARR

                                            ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                                                         'name'=>'TBA_ARR',
                                                         'subject'=>'TBA'
                                                           ,'value'=>$info->TBA_ARR

                                                          ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                                                       'name'=>'WCH_ARR',
                                                       'subject'=>'WCH'
                                                       ,'value'=>$info->WCH_ARR

                                                        ])
                            @endcomponent
                        </div>
                    </div>

                    </div>
                </div>
            </div>

        {{-----------------------------Cargo Arrival---------------------------}}
        <div style="width: 50%;margin: 0 0 10px 10px;border-radius: 5px;border: 1px solid #1E90FF ">

            <div class="divTableRow" >
                <div class="divTableCell" style="width: 3%;padding: 0 0 0 0">
                    <span style="background-color: #1E90FF;border-radius: 5px" class="input-group-text">Cargo</span>

                </div>
                <div class="divTableCell" style="width: 20.5%">
                    @component('components.InputForFetch',[
                                                              'name'=>'PaxCargoArr',
                                                              'subject'=>'Pax'
                                                              ,'value'=>$info->PaxCargoArr

                                                               ])
                    @endcomponent
                </div>
                <div class="divTableCell" style="width: 20.5%">
                    @component('components.InputForFetch',[
                                                               'name'=>'WeightCargoArr',
                                                               'subject'=>'Weight'
                                                               ,'value'=>$info->WeightCargoArr

                                                                ])
                    @endcomponent
                </div>
            </div>

        </div>
        {{-----------------------------Cargo Arrival---------------------------}}
        </div>

    </div><br>

    <div style="border: 1px #7FFFD4 solid;border-radius: 5px ;margin: 0 25px 0 25px">
        <div  style="height: 40px;background-color: #7FFFD4 ;text-align: center;font:2em bold"> DEPARTURE</div>
        <div>
            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                               'name'=>'ChocksOf',
                               'subject'=>'ChocksOf',
                               'value'=>$info->ChocksOf
                                 ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                                 'name'=>'ATD',
                                 'subject'=>'A.Time.D',
                                'value'=> $info->ATD


                                  ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 34%">

                        </div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%;">
                            @component('components.InputForFetch',[
                           'name'=>'ADL_Dep',
                           'subject'=>'ADL',
                           'value'=>$info->ADL_Dep

                            ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%;">
                            @component('components.InputForFetch',[
                              'name'=>'CHD_Dep',
                              'subject'=>'CHD',
                                'value'=>$info->CHD_Dep
                               ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%;">
                            @component('components.InputForFetch',[
                              'name'=>'INF_Dep',
                              'subject'=>'INF',
                                'value'=>$info->INF_Dep
                               ])
                            @endcomponent
                        </div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%;">
                            @component('components.InputForFetch',[
                                'name'=>'TPD_Dep',
                                'subject'=>'TPD',
                                  'value'=>$info->TPD_Dep
                                 ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%;">
                            @component('components.InputForFetch',[
                              'name'=>'TBD_Dep',
                              'subject'=>'TBD',
                                'value'=>$info->TBD_Dep
                               ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%;">
                            @component('components.InputForFetch',[
                              'name'=>'VCIP_Dep',
                              'subject'=>'VIP/CIP',
                              'value'=>$info->VCIP_Dep
                               ])
                            @endcomponent
                        </div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%;">
                            @component('components.InputForFetch',[
                               'name'=>'WCH_Dep',
                               'subject'=>'WCH',
                                'value'=>$info->WCH_Dep
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
            {{-------------------------------Cargo Dep--------------------------------}}
            <div style="width: 50%;margin: 0 0 10px 10px;border-radius: 5px;border: 1px solid #1E90FF ">

                <div class="divTableRow" >
                    <div class="divTableCell" style="width: 3%;padding: 0 0 0 0">
                        <span style="background-color: #1E90FF;border-radius: 5px" class="input-group-text">Cargo</span>

                    </div>
                    <div class="divTableCell" style="width: 20.5%">
                        @component('components.InputForFetch',[
                                                                  'name'=>'PaxCargoDep',
                                                                  'subject'=>'Pax'
                                                                  ,'value'=>$info->PaxCargoDep

                                                                   ])
                        @endcomponent
                    </div>
                    <div class="divTableCell" style="width: 20.5%">
                        @component('components.InputForFetch',[
                                                                   'name'=>'WeightCargoDep',
                                                                   'subject'=>'Weight'
                                                                   ,'value'=>$info->WeightCargoDep

                                                                    ])
                        @endcomponent
                    </div>
                </div>

            </div>
            {{-------------------------------Cargo Dep--------------------------------}}


        </div>
    </div><br>

    <div style="border: 1px #D3D3D3 solid;border-radius: 5px;margin: 0 25px 0 25px">
        <div style="height: 40px;background-color: #D3D3D3 ;text-align: center;font:2em bold"> GATE / HALL</div>
        <div>
            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                      'name'=>'Hall',
                      'subject'=>'HALL',
                       'value'=>$info->Hall
                       ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.InputForFetch',[
                                'name'=>'Gate',
                                'subject'=>'Gate',
                                'value'=>$info->Gate
                                 ])
                            @endcomponent</div>
                        <div class="divTableCell" style="width: 33.5%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
        <b ><button type="button" style="width: 250px;border-radius: 5px;margin-left:25px;margin-top:10px" class="btn btn-outline-primary" href="#" onclick=" myPopup ('{{Route('DelayCodeSave',['id'=>$_REQUEST['id']])}}', 'web', 550,250);">Delay Form</button></b>
    
    <br>


<?php   $fltid = DB::select(DB::raw("(SELECT count(1) as num FROM delay_flights a , arrdep_infos b WHERE a.flightid = b.id and b.id= $info->id)"));?>

    @if(!empty($fltid))

<div style="margin-left: 30%">
    <div class="groupbox-shadow" style="width:400px;padding-right:5px">
        <table>
            <thead>
            <th>delay code</th>
            <th>delay Time</th>

            <th>Edit</th>
            <th>Delete</th>
            </thead>


            @foreach($delayinfo as $del)

                       <tbody>
                        <td>{{$del->delaycode}}</td>
                        <td>{{$del->DelayTime}}</td>

                            <td>
                                <a href="#" onclick=" myPopup ('{{Route('FlightDelayShowInfo',['id'=>$del->id])}}', 'web', 550,250);">
                                <img src="images/edit.png">
                                </a>
                            </td>
                        <td>
                            <a href="{{Route('FlightDelayDeleteInf',['id'=>$del->id ])}}">
                            <img src="images/delete.png"  >
                            </a>
                        </td>
                    </tbody>
            @endforeach
        </table>
          <div>
              <b>
                Total Delat Time :
                <?php
                $sum=0 ;foreach ( $delayinfo as $total){$sum += $total->DelayTime ;}echo $sum;
                ?>
                Min
              </b>
            </div>
         </div>
</div>
            @endif


    {{--@endif--}}
    <br>
    <div style="margin: 0 25px 10px 25px">
        <textarea  rows="6" cols="100" name="Remark" placeholder="Remark">{{ $info->Remark }}</textarea>
    </div>
        <div style="text-align: center">
        <button  style="width: 250px;height: 50px;border-radius: 5px;margin-top: 10px" type="submit" class="btn btn-success">Save Info</button>
    </div>
</form>


<div id="snackbar" style="background-color: #4CAF50;width: 600px;border-radius: 5px">Flight Update successfully !!!</div>
<script>
    function myPopup(myURL, title, myWidth, myHeight) {
        var left = (screen.width - myWidth) / 2;
        var top = (screen.height - myHeight) / 6;
        var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
    }

    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
    }

   </script>

@endsection
