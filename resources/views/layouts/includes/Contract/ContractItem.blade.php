@extends('layouts.app')
@section('content')
    <style>
        .FormContiner{
            border: 1px #1E90FF solid;
            border-radius: 5px
        }
        #ContractHeader{
            height: 40px;
            background-color: #d5d8dc ;
            border: 1px #1E90FF solid ;
            text-align: left;
            font:2em bold;
            padding-bottom: 5px
        }
       #ServicesBox{
           display: none;
       }


        .btn {
            background-color: DodgerBlue; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 12px 16px; /* Some padding */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
        }

        tr.group,
         tr.group:hover {
        background-color: #ddd !important;
        }
    </style>

    <div class="FormContiner">
        <div id="ContractHeader"> Contract</div>

        <div class="divTableRow">
            <div class="divTableCell" >
                <div  class="input-group" style="top: 5px;padding-bottom: 10px">
                    <div  class="input-group-prepend" style="width: 22%">

                        <?php  $Cm =''; if(!empty($cndata)) { $Cm = $cndata->ContractNum ; } ?>
                        @component('components.textbox',[
                              'name'=>'ContractNum'
                              ,'subject'=>'Contract Number'
                              ,'is_lock'=>'true'
                              ,'value'=> $Cm
                          ])
                        @endcomponent

                    </div>
                    <div  class="input-group-prepend" style="width: 18%">
                        <?php  $air=''; if(!empty($cndata)) { $air = $cndata->AirLine ; } ?>
                        @component('components.textbox',[
                              'name'=>'AirLine'
                              ,'subject'=>'AirLine'
                              ,'value'=>$air
                              ,'is_lock'=>'true'
                          ])
                        @endcomponent
                    </div>
                    <div  class="input-group-prepend" style="width: 18%">
                        <?php $Sym=''; if(!empty($cndata)) { $Sym = $cndata->Symbol ; } ?>
                        @component('components.textbox',[
                          'name'=>'Symbol'
                          ,'subject'=>'Symbol'
                          ,'value'=>$Sym
                          ,'is_lock'=>'true'
                      ])
                        @endcomponent
                    </div>
                    <div  class="input-group-prepend" style="width: 22%">
                        <?php $Stdate = ''; if(!empty($cndata)) { $Stdate= $cndata->StartDate ; } ?>
                        @component('components.textbox',[
                          'name'=>'StartDate'
                          ,'subject'=>'Start Date'
                          ,'value'=>$Stdate
                          ,'is_lock'=>'true'
                      ])
                        @endcomponent
                    </div>
                    <div  class="input-group-prepend" style="width: 20%">
                         <?php $Endate=''; if(!empty($cndata)) { $Endate= $cndata->EndDate ; } ?>
                        @component('components.textbox',[
                      'name'=>'EndDate'
                      ,'subject'=>'End Date'
                      ,'value'=>$Endate
                      ,'is_lock'=>'true'
                  ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
</div>
<br>

    <div {{--id="ServicesBox" --}}class="FormContiner" style="display:<?php if(!empty($dis)){ echo 'block' ;} ?> ">
        <div id="ContractHeader">Minimum Ground Time</div>
        <div  class="input-group" style="top: 5px;padding-bottom: 10px">

            <button class="btn" style="width: 280px;height: 40px"
                    onclick=" myPopup ('{{Route('MinGroundTimeForm',['ContractNum'=>$Cm])}}', 'web', 500,300);">
                <i class="fa fa-folder"></i>     <i> MinimumGroundTime Form</i></button>
        </div>
        <div  class="input-group" style="top: 5px;padding-bottom: 10px">

           <a class="btn" style="width: 120px;height: 40px" href="{{Route('ContactMinDataFetch',['ContractNum'=>$Cm])}}">
                <i class="fa fa-refresh"></i>     <i> Refresh </i></a>
        </div>


        <div style="margin-left: 5%">
            <div class="groupbox-shadow" style="width:85%;padding-right:5px">
                <table id="ContractItem">
                    <thead>
                    <th style="width: 50%">Type</th>
                    <th style="width: 20%">MinTime</th>
                    <th style="width: 20%">Services</th>
                    <th style="width: 30%">Edit</th>

                    </thead>

                    @if (!empty($Mingt))
                      @foreach($Mingt as $Mininfo)
                            <tbody>
                            <tr>
                                <td >{{$Mininfo->Type}}</td>
                                <td >{{$Mininfo->MinGroundTime}}</td>
                                <td > <a class="btn" style="width: 180px;height: 40px"
                                              onclick=" myPopup ('{{Route('ServicesItemPage',['ContractNum'=>$CTN,'Minid'=>$Mininfo->id])}}', 'web', 600,350);">
                                        <i class="fa fa-folder"></i>     <i> Service Form</i></a>
                                </td>
                                <td>
                                    <a href="#" onclick=" myPopup ('{{Route('ContractItem')}}', 'web', 500,300);"><img src="images/edit.png"></a>
                                    <a id="delete"><img src="images/delete.png"></a>
                                </td>
                                </tr>
                                <tr>
                                <?php
            use App\ContractServices ;
            if(!empty($cndata) &&  !empty($Mingt)){
            $tbl = ContractServices::where('ContractNum',$cndata->ContractNum)->where('GrountTime_id',$Mingt->id)->get();
            }
            ?>

                  <table id="tblservices">
                        <thead>
                        <th>id</th>
                        <th>Service</th>
                        <th>Unit</th>
                        <th>Base Pay</th>
                        <th>Currency</th>
                        <th>Total</th>
                        <th>Sum Total</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        @if(!empty($tbl))
                             @foreach($tbl as $info)

                            <tbody>
                                <td >{{$info->id}}</td>
                                <td id="service">{{$info->ServiceName}}</td>
                                <td id="Unit">{{$info->DeviceUnit}}</td>
                                <td id="BasePay">{{$info->BasePay}}</td>
                                <td id="Currency">{{$info->CurrencyUnit}}</td>
                                <td id="Total">{{$info->Total}}</td>
                                <td id="SumTotal">{{$info->SumTotal}}</td>

                                <td>
                                    <a href="#" onclick=" myPopup ('{{Route('ContractItem')}}', 'web', 500,300);">
                                        <img src="images/edit.png">
                                    </a>
                                </td>
                                <td>
                                    <button id="delete" class="btn btn-danger btn-xs mdi-delete" >
                                        <img src="images/delete.png">
                                    </button>
                                </td>
                                </tbody>
                                @endforeach
                            </table>
                        @endif
                    </tr>

                            </tbody>
                        @endforeach
                        @endif
                </table>
                <br>
                </div>
            <br>
           </div>
        </div>

{{------------------------------------Services List-----------------------------------------}}
<br>

    <div {{--id="ServicesBox" --}}class="FormContiner" style="display:<?php if(!empty($dis)){ echo 'block' ;} ?> ">
        <div id="ContractHeader"> Services List</div>

        {{------------------------------------btn-----------------------------------------}}

        <div  class="input-group" style="top: 5px;padding-bottom: 10px">
            <?php $CTN = ''; if(!empty($cndata)){ $CTN = $cndata->ContractNum ; } ?>
            <button class="btn" style="width: 180px;height: 40px"
                    onclick=" myPopup ('{{Route('ServicesItemPage',['ContractNum'=>$CTN])}}', 'web', 600,350);">
                <i class="fa fa-folder"></i>     <i> Service Form</i></button>
        </div>

        {{------------------------------------Tbl-----------------------------------------}}

            <?php
            use App\ContractServices ;
            if(!empty($cndata) &&  !empty($Mingt)){
            $tbl = ContractServices::where('ContractNum',$cndata->ContractNum)->where('GrountTime_id',$Mingt->id)->get();
            }
            ?>

            <div style="margin-left: 5%">
                <div class="groupbox-shadow" style="width:95%;padding-right:5px">
                    <table id="tblservices">
                        <thead>
                        <th>id</th>
                        <th>Service</th>
                        <th>Unit</th>
                        <th>Base Pay</th>
                        <th>Currency</th>
                        <th>Total</th>
                        <th>Sum Total</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
@if(!empty($tbl))
                        @foreach($tbl as $info)

                            <tbody>
                            <td >{{$info->id}}</td>
                            <td id="service">{{$info->ServiceName}}</td>
                            <td id="Unit">{{$info->DeviceUnit}}</td>
                            <td id="BasePay">{{$info->BasePay}}</td>
                            <td id="Currency">{{$info->CurrencyUnit}}</td>
                            <td id="Total">{{$info->Total}}</td>
                            <td id="SumTotal">{{$info->SumTotal}}</td>

                            <td>
                                <a href="#" onclick=" myPopup ('{{Route('ContractItem')}}', 'web', 500,300);">
                                    <img src="images/edit.png">
                                </a>
                            </td>
                            <td>
                                <button id="delete" class="btn btn-danger btn-xs mdi-delete" >
                                    <img src="images/delete.png">
                                </button>
                            </td>
                            </tbody>
                        @endforeach

                    </table>
                    <div>
                        <b>
                            SumTotal Price :
                            <?php
                            $sum=0 ;foreach ( $tbl  as $total){$sum += $total->sumtotal ;}echo $sum;
                            ?>
                            Min
                        </b>
                    </div>
   @endif

                </div>
           </div>
    </div>
<br>





    <script>

        function myPopup(myURL, title, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 6;
            var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
        }
    </script>

@endsection
