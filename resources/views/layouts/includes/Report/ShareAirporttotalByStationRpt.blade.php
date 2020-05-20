@extends('layouts.app')
    @section('content')

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        
    <button  type="submit" class="btn btn-success"  style="width: 40%;" data-toggle="modal" data-target="#myModal" > <i class="fa fa-search"></i> <i>Search</i></button>
    
<br>
<br>
<div><b>This Report it Was From: 
<span style="color:Green ">@if(!empty($data1)){{$date1}} @endif </span> 
To: <span style="color:Green ">@if(!empty($data2)){{$date2}} @endif</span></b>
</div>



<table >
         <thead >
        
        <th style="width: 250px">Station</th>
        <th scope="col">Price Total</th>
                      
        </thead>
        <tbody>
        @if(!empty($data))
       @foreach($data as $list)
    
        <tr>
        
        <td><a href="{{Route('ShareAirortTotalRptSearch',['Station'=>$list->Station,'date1'=>$date1,'date2'=>$date2])}}" target="_blank">
        {{$list->Station}}</td>
         
        <td>{{number_format($list->price)}}</td>
        
        </tr>
        @endforeach
        @endif
        
        <tr >
        <td colspan="1" style="font-family:'B Titr';font-size: 20px;text-align:right"> SumTotal :</td>

        <td style="background-color:red"><b>@if(!empty($data))<?php $sum=0 ; foreach ( $data as $Sumdata){$sum += $Sumdata->price ;}echo number_format($sum);?>@endif</b></td>
        
    </tr>
   
        </tbody>
        </table>
        

        {{-------------------------------------------Form Model----------------------------------------}}

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">        
        <div class="modal-body">
        <form method="POST" action="{{Route('ShareAirortTotalByStationSearch')}}">
         @csrf  

               
                
                          <input id="StartDate" type="date"  name="StartDate" REQUIRED>
                     
       <br>
       <br>
                 
                          <input id="EndDate" type="date" name="EndDate" REQUIRED>
                      

                          <br>
                          <br>
       <div style="text-align:center"> <button type="submit" id="btn" class="btn btn-success" style="width: 50%;"> <i class="fa fa-search"></i> <i>Search</i></button></div>
        
        
        </form>
                   
        <div class="modal-footer">
          <button type="button"  class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> <i>Close</i></button>
        </div>
      </div>
      
    </div>
  </div>
  
{{-----------------------------------------------------------------------------------}}



@endsection