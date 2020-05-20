@extends('layouts.app')
    @section('content')

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        
    {{--<button  type="submit" class="btn btn-success"  style="width: 40%;" data-toggle="modal" data-target="#myModal" > <i class="fa fa-search"></i> <i>Search</i></button>--}}
    
<div><b>This Report it Was From: 
<span style="color:Green ">@if(!empty($data1)){{$date1}} @endif </span> 
To: <span style="color:Green ">@if(!empty($data2)){{$date2}} @endif</span></b>
</div>

    <table >
         <thead >
        
        <th scope="col">Station</th>
        <th scope="col">Type</th>
        <th scope="col">Total</th>
                      
        </thead>
        <tbody>
        @if(!empty($data))
       @foreach($data as $list)
    
        <tr>
        
        <td>{{$list->Station}}</td>
         <td><a href="{{Route('ShareAirortRptSearch',['Type'=>$list->Type,'Station'=>$list->Station,'date1'=>$date1,'date2'=>$date2])}}" target="_blank">
         {{$list->Type}}
        </a></td>
        <td>{{number_format($list->price)}}</td>
        
        </tr>
        @endforeach
        @endif
        
        <tr >
        <td colspan="2" style="font-family:'B Titr';font-size: 20px;text-align:right"> SumTotal :</td>

        <td style="background-color:red"><b>@if(!empty($data))<?php $sum=0 ; foreach ( $data as $Sumdata){$sum += $Sumdata->price ;}echo number_format($sum);?>@endif</b></td>
        
    </tr>
   
        </tbody>
        </table>

    @endsection