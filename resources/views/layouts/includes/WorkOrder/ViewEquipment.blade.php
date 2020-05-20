@extends('layouts.app')

@section('content')

    @foreach($eqs as $eq)
        <div class="groupbox-shadow" style="padding-bottom:5px">

<table style="width:98%">
<thead>
<th>Station</th>
<th>GHCN NO </th>
<th>Airline</th>
<th>Reg.Mark</th>
<th>BasicServices</th>
<th>Basic Rate</th>
</thead>
<tbody>
<tr>
<td>{{$eq->From}}</td>
<td>{{$eq->GHCN_NO}}</td>
<td>{{$eq->Airline}}</td>
<td>{{$eq->Reg}}</td>
<td>  
@switch($eq->BasicServices)
           @case('a') passenger Aircraft
           @break
           @case('b') Combined passenger and cargo
           @break
           @case('c') Cargo Aircraft
           @break
           @case('d') Technical Landing / ramp Handling
           @break
           @case('e') Night
           @break
           @case('f') Holiday
           @break
        @endswitch
         </td>
         <td>{{$eq->BasicRateid}}</td>
    </tr>
    </tbody>

    </table>
    <br>

    <table style="width:98%">
    <thead>
    <th>Extra Equpment</th>
    <th>Delay Time </th>
    <th>Accepted By </th>
    <th>Total Price </th>
    <th>Detail</th>
        
    </thead>
<tbody>
<tr>

<td><span class="fltinfo">Yes/No</span> </td>
<td><span class="fltinfo">Code : --- / Time   </span> </td>
<td><span class="fltinfo">Yes / Mr :----    </span></td>
<td><span class="fltinfo"> ------------ Rial    </span> </td>
<td><a type="button" class="btn btn-success"  href="{{Route('ViewDetailEquipment',['ghcn'=>$eq->GHCN_NO])}}">
    <i class="fa fa-folder"></i> <i>Detail</i><a></td>


</tbody>

        </table>
       
    </div>
    <br>
    @endforeach

    

@endsection()
