@extends('layouts.app')

@section('content')

    <style>

        table{
            margin-left: 8%;
            width: 70%;
            font-family: Tahoma;
            font-size: small;
            text-align: center;
        }
        table,td,th{
            border: 1px solid black;
        }
        th{
            height: 30px;
            background-color: silver;
        }
    .inputtime{
        width: 70px;
        text-align: center;
        border: 1px solid black;
        border-radius: 5px;
}

    </style>
<label style="padding-left: 350px"><B>Ground Hnadling Charge Note (GHCN)</B></label>
    <div class="groupbox-shadow" >

        <div class="page1" {{--style="padding:2px 0px 10px 80px"--}}>
            @component('components.InputForFetch',[
                                    'name'=>'Station'
                                    ,'subject'=>'Station'
                                    ,'value'=>$flt->From
                                    ,'is_lock'=>true
                                      ])
            @endcomponent
                @component('components.InputForFetch',[
                                        'name'=>'A/c Owner',
                                        'subject'=>'A/c Owner' ,
                                        'value'=>$flt->Airline
                                        ,'is_lock'=>true
                                          ])
                @endcomponent
                @component('components.InputForFetch',[
                                        'name'=>'Type Of A/c',
                                        'subject'=>'Type Of A/c',
                                        'value'=>$flt->Type
                                        ,'is_lock'=>true
                                          ])
                @endcomponent
                @component('components.InputForFetch',[
                                                        'name'=>'Reg.Marks',
                                                        'subject'=>'Reg.Marks',
                                                        'value'=>$flt->Reg
                                                        ,'is_lock'=>true
                                                        ])
                @endcomponent
                <br>
                @component('components.InputForFetch',[
                        'name'=>'Arrival From',
                        'subject'=>'Arrival From',
                        'value'=>$flt->Arrival
                        ,'is_lock'=>true
                          ])
                @endcomponent
                @component('components.InputForFetch',[
                           'name'=>'Time(LT)',
                           'subject'=>'Time(LT)',
                           'value'=>$flt->ETA
                           ,'is_lock'=>true
                          ])
                @endcomponent
                @component('components.InputForFetch',[
                       'name'=>'Date',
                       'subject'=>'Date',
                       'value'=>$flt->Date_ETD
                       ,'is_lock'=>true
                         ])
                @endcomponent
                @component('components.InputForFetch',[
                            'name'=>'Flt.No',
                            'subject'=>'Flt.No',
                            'value'=>$flt->Arr_No
                            ,'is_lock'=>true
                           ])
                @endcomponent
                <br>
                @component('components.InputForFetch',[
                                           'name'=>'Departure To',
                                           'subject'=>'Departure To',
                                           'value'=>$flt->To
                                           ,'is_lock'=>true
                                           ])
                @endcomponent
                @component('components.InputForFetch',[
                                        'name'=>'Time(LT)',
                                        'subject'=>'Time(LT)',
                                        'value'=>$flt->ATD
                                        ,'is_lock'=>true

                                        ])
                @endcomponent
                    @component('components.InputForFetch',[
                                    'name'=>'Date',
                                    'subject'=>'Date',
                                    'value'=>$flt->Date_ETD
                                    ,'is_lock'=>true
                                    ])
                    @endcomponent
                @component('components.InputForFetch',[
                                'name'=>'Flt.No',
                                'subject'=>'Flt.No',
                                'value'=>$flt->Dep_No
                                ,'is_lock'=>true
                            ])
                @endcomponent

        </div>
   </div>

    <br>
    <label>basic Services As Per Agreement :</label>
    <form method="post" action="{{Route('EquipmentInsert')}}" enctype="multipart/form-data">

        @csrf
    <div class="groupbox-shadow" style="padding-left: 40px;">

        <input type="checkbox" name="check_list[]" value="a">     a-passenger Aircraft <br>
        <input type="checkbox" name="check_list[]" value="b">     b-Combined passenger and cargo <br>
        <input type="checkbox" name="check_list[]" value="c">     c-Cargo Aircraft <br>
        <input type="checkbox" name="check_list[]" value="d">     d-Technical Landing / ramp Handling <br>
        <input type="checkbox" name="check_list[]" value="e">     e-Night <br>
        <input type="checkbox" name="check_list[]" value="f">     f-Holiday <br><br>

    </div>

        <?php

        if(isset($_POST['submit'])){//to run PHP script on submit
            if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
                foreach($_POST['check_list'] as $selected){
                     $checklist = $selected.",";
                }
            }
        }
        ?>

    <br>
<label><B>ADDITIONAL SERVICES :</B></label><br>

        <span style="position: absolute;float: right;top: 7px;left: 670px">
                <input id="Ghcn" width="80px" name="Ghcn" class="form-control @error('Ghcn') is-invalid @enderror" placeholder="GHCN NO" required autofocus>
        @error('Ghcn')
                    <span style="position: absolute;top: 5px;left: 220px" class="invalid-feedback" role="alert" >
                       <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </span>


    <label for="BasicRateid">BasicRate :</label>
    <select name="BasicRateid" style="width: 70%;height: 35px; left: 50px;">
        <?php
        use App\BasicRate;
        /*** query the database ***/
        $result = BasicRate::select('Subject')->get();
          ?>
            <option hidden value="" disabled selected>Select your option</option>
        /*** loop over the results ***/
        @foreach($result as $row)
            /*** create the options ***/
             <option >
                {{ $row->Subject }}
            </option>
        @endforeach
             </select>

        <br>


          <input type="hidden" name="Flightid" value="{{$flt->id}}" >

        <br>

        <table>
                <thead >
                <th style="width: 220px">A-Transportation :</th>
                <th style="width: 90px">Unit</th>
                <th>Utilization </th>
                <th>Amonunt</th>

            <tbody >
            <tr >
                <td >
                    <label>Crew Ramp Car</label>
                 </td>
                  <td>
                    @component('components.InputText',[
                                     'name'=>'CrewCare'

                                      ])
                    @endcomponent
                </td>
                <td>
                    <input  class="inputtime" type="text" name="CrewCareTime" placeholder="Min">

                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Pax Coach</label>
                </td>
                <td>
                    @component('components.InputText',[
                         'name'=>'PaxCoach'
                          ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"   name="PaxCoachTime" class="inputtime" placeholder="Min" >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Lif-o-Mobile for invalid pax</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'LOM'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="LOMTime" class="inputtime" placeholder="Min" >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Surface Transport:Bus-minibus-car</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'bmc'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="bmcTime" class="inputtime" placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Vip Car</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'vipcar'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="vipcarTime" class="inputtime" placeholder="Min"
                           >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Wheelchair</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'wch'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="wchTime" class="inputtime" placeholder="Min" >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr ><td colspan="4" style="text-align: left;background-color: #95999c"><b>B-A/C Servicing Equipment: </b></td></tr>
            <tr>
                <td>
                    <label>Ground Power Unit</label>
                </td>
                <td>
                    @component('components.InputText',[
                            'name'=>'Gpu'
                               ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="GpuTime" class="inputtime" placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Airconditioning Unit</label>
                </td>
                <td>
                    @component('components.InputText',[
                                  'name'=>'Acu'
                                   ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="AcuTime" class="inputtime" placeholder="Min" >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Air Start Unit</label>
                </td>
                <td>
                    @component('components.InputText',[
                                  'name'=>'Asu'
                               ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="AsuTime" class="inputtime" placeholder="Min"
                           >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Push Back</label>
                </td>
                <td>
                    @component('components.InputText',[
                                                  'name'=>'PushBack'

                                                   ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="PushBackTime" class="inputtime" placeholder="Min"
                           >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>CPL/MDL</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'cpl'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="cplTime" class="inputtime" placeholder="Min"
                           >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Fork Lift</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'Liftruck'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="LiftruckTime" class="inputtime" placeholder="Min"
                          >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Push Car</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'TowTractor'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="TowTractorTime" class="inputtime" placeholder="Min"
                           >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tow BAR</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'towbar'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="towbarTime" class="inputtime" placeholder="Min"
                          >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>conveyer Belt</label>
                </td>
                <td>
                    @component('components.InputText',[
                                                    'name'=>'Belt'

                                                     ])
                    @endcomponent
                </td>
                <td>
                   <input type="text"  name="BeltTime" class="inputtime" placeholder="Min"
                    >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Lavatory Service Truck (L.S.T)</label>
                </td>
                <td>
                    @component('components.InputText',[
                                  'name'=>'Lsu'
                                   ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="LsuTime" class="inputtime"
                           placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Water Service Truck (W.S.T)</label>
                </td>
                <td>
                    @component('components.InputText',[
                                  'name'=>'Wsu'
                                   ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="WsuTime" class="inputtime"
                           placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Pax Step</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'PaxStep'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="PaxStepTime" class="inputtime"
                           placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Baggage Trailer</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'BaggageTrailer'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="BaggageTrailerTime" class="inputtime" placeholder="Min"
                           >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Catering High Lift Truck</label>
                </td>
                <td>
                    @component('components.InputText',[
                                'name'=>'CateringLift'

                                 ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="CateringLiftTime" class="inputtime" placeholder="Min"
                           >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Stretcher</label>
                </td>
                <td>
                    @component('components.InputText',[
                               'name'=>'Stretcher'

                                ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="StretcherTime" class="inputtime" placeholder="Min"
                   >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Man Power</label>
                </td>
                <td>
                    @component('components.InputText',[
                               'name'=>'ManPower'

                                ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="ManPowerTime" class="inputtime" placeholder="Min"
                    >
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Chocks</label>
                </td>
                <td>
                    @component('components.InputText',[
                                 'name'=>'Chocks'

                                  ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="ChocksTime" class="inputtime"
                           placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Headset</label>
                </td>
                <td>
                    @component('components.InputText',[
                                  'name'=>'Headset'

                                   ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="HeadsetTime" class="inputtime"
                           placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>De-Icer / Washer Truck</label>
                </td>
                <td>
                    @component('components.InputText',[
                                  'name'=>'Deicer'

                                   ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="DeicerTime" class="inputtime"
                           placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    <label>De-Icing Fluid</label>
                </td>
                <td>
                    @component('components.InputText',[
                                  'name'=>'Deicefluid'

                                   ])
                    @endcomponent
                </td>
                <td>
                    <input type="text"  name="DeicefluidTime" class="inputtime"
                           placeholder="Min">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
        <td colspan="4" style="background-color: #95999c;text-align: left"><b>C-Cargo Transportation/Mail.Other :</b></td>
            </tr>

            <tr>
                <td>
                    <b><label>Remark</label></b>
                </td>
                <td colspan="3">
                    <textarea style="width: 100%;border-radius: 5px" type="text" name="Remark" placeholder="Remarks"></textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <br>


<div style="padding-left: 30%;">
    <button type="submit" name="submit" class="btn btn-success" style="background-color: green;width: 250px">Save</button>
</div>

    </form>


@endsection
