@extends('layouts.app')

@section('content')
    <style>
        table{
            width: 100%;
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
    </style>

<div class="groupbox-shadow" style="text-align: center">
    <form method="post" action="DelayCodeTable">
        @csrf

        <textarea rows="4"  style="width: 95%"  name="DelayDesc" placeholder="Write Delay Item "></textarea><br>
        <button type="submit" style="width: 155px" class="btn btn-success">Save</button><br>
    </form>

<br>
</div>
        @include('layouts.includes.flash-message')
<br>
    <table   class="table-hover">
        <thead  class="table-primary" >
            <th style="width: 100px">ACTION  </th>
            <th scope="col"> REASON </th>
            <th style="width: 40px"> No </th>
        </thead>
        <tbody >
        @foreach($data as $delay)
        <tr>
            <td> <a href="{{route('DelayFormEdit',[
                          'id'=>$delay->id,
                          'DelayDesc'=>$delay->DelayDesc
                           ])}}" >
                    <img src="images/edit.png" style="width: 25px;height: 25px">
                </a>
                <a href="{{route('DelayCodeDelete',['id'=>$delay->id])}}">
                    <img src="images/delete.png" style="width: 25px;height: 25px">
                </a>
            </td>
            <td  style="text-align: right">{{$delay->DelayDesc}}</td>
            <td >
                {{$delay->id}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
