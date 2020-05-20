@extends('layouts.app')
@section('content')
<style>
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


        * {
            box-sizing: border-box;
        }

        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #0b7dda;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }


</style>

@include('layouts.includes.func.DateConvert')



<div class="groupbox-shadow" style="width: 640px" >
<form class="example" method="post" action="{{Route('ContactSearch')}}" style="margin: 0 0 10px 0;max-width:600px">
    @csrf
    <button type="submit"><i class="fa fa-search"></i></button>
    <input type="text" placeholder="Search.." name="contract">
</form>

</div>
<br>
<table>
    <thead>
        <th>ContractNum</th>
        <th>Airline</th>
        <th>Symbol</th>
        <th>StartDate</th>
        <th>EndDate</th>
        <th>details</th>
    </thead>
    <tbody>
    @foreach($CnList as $list)
            <tr>
            <td>{{$list->ContractNum}}</td>
            <td>{{$list->AirLine}}</td>
            <td>{{$list->Symbol}}</td>
            <td><span style="background-color:#ff751a">EN :{{$list->StartDate}} </span> &nbsp; <span style="background-color: #47d147"> FA :{{DateSplit($list->StartDate)}}</span></td>
            <td><span style="background-color:#ff751a">EN :{{$list->EndDate}}</span>&nbsp; <span style="background-color: #47d147"> FA :{{DateSplit($list->EndDate)}}</span></td>
            <td><a  class="btn" style="width: 280px;height: 40px" href="{{Route('ctitem',['ContractNum'=>$list->ContractNum])}}">
                        <i class="fa fa-plus"></i>   <i> details</i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
