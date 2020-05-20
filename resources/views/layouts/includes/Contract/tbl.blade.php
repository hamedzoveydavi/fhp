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

    <table id="ContractItem">
        <thead>
        <th> Contract NO</th>
        <th> Airline  </th>
        <th> Symbol   </th>
        <th> Duration  </th>
        <th>MinForm</th>
         </thead>
        <tbody>
        <td>{{$data->ContractNum}}</td>
        <td>{{$data->AirLine }}</td>
        <td>{{$data->Symbol}}</td>
        <td>{{$data->StartDate}} - {{$data->EndDate}}</td>
        <td><button  class="btn" style="width: 280px;height: 40px"
                        onclick=" myPopup ('{{Route('MinGroundTimeForm',['ContractNum'=>$data->ContractNum])}}', 'web', 500,300);">
                         <i class="fa fa-folder"  ></i>   <i> MinroundTime Form</i></button></td>
        </tbody>
    </table>
    <br>


    <div class="groupbox-shadow" style="padding: 5px 10px 10px 10px">

        <table>

            @foreach($Mingt as $mm)
                <thead>
                <th>
                    <button  class="btn" style="width: 280px;height: 40px"
                             onclick=" myPopup ('{{Route('ServicesItemPage',['ContractNum'=>$data->ContractNum,'Minid'=>$mm->id])}}', 'web', 600,390);">
                        <i class="fa fa-plus"></i>   <i> Services Form</i></button>

                </th>
                <th colspan="6" style="width: 15%;padding-top: 5px">
                    <label style="background-color: #737373;border-radius: 5px;width: 150px;height: 25px">Type : {{$mm->Type}} </label>
                    <label style="background-color: #737373;border-radius: 5px;width: 200px;height: 25px">MinGrountTime : {{$mm->MinGroundTime}} </label>
                    <label style="background-color: #737373;border-radius: 5px;width: auto;height: 25px">
                  
                   Contract Price : <?php $sum=0 ;
                    foreach($sdata as $s1){
                        if(!empty($s1->Minid)){
                        if ($mm->id == $s1->Minid){
                        $sum += $s1->SumTotal ;}}}
                         echo number_format($sum).'&nbsp;';
                         echo $s1->CurrencyUnit;
                        
                         ?>
                         
                    </label>

                </th>
                </thead>
             <thead>

            <th style="width: 15%">Service</th>
            <th style="width: 20%">BasePay</th>
            <th style="width: 10%">Total</th>
            <th style="width: 20%">SumTotal</th>
            <th style="width: 30%">Edit</th>
            </thead>

             @foreach($sdata as $ss)
                <tbody>
                @if ($mm->id == $ss->Minid)
                <tr  style="display:<?php if(empty($sdata)){echo none ;}?> ">

                    <td> {{$ss->ServiceName}}</td>
                    <td> {{$ss->BasePay}} {{$ss->CurrencyUnit}}</td>
                    <td>{{$ss->Total}} {{$ss->DeviceUnit}}</td>
                    <td>{{$ss->SumTotal}} {{$ss->CurrencyUnit}}</td>
                    <td> <a href="#" onclick=" myPopup ('{{Route('ServicesItemPageForUpdate',['id'=>$ss->id])}}', 'web', 600,390);"><img src="images/edit.png"></a>
                        <a id="delete"  href="{{Route('ServiceDelete',['serid'=>$ss->id])}}"> <img src="images/delete.png"></a></td>
                </tr>

                @endif
                </tbody>
                @endforeach
            @endforeach
              </table>
            <br>
         </div>
     <div>
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
