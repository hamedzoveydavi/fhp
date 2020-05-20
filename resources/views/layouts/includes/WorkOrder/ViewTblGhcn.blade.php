@extends('layouts.app')

@section('content')

    <table class="table table-hover"  >

        <thead class="table-primary table table-bordered" >

        <th >GHCN</th>
        <th >Basic Rate</th>
        <th >Night</th>
        <th >Holiday</th>
        <th >Cargo</th>

        </thead>
        <tbody style="font-size: 2px;">
        @foreach($data as $q)
            <tr>
                <td>{{$q->GHCN_NO}}</td>

                <td>{{$q->BasicRateid}}</td>
                <td>{{$q->NightCharges}}</td>
                <td>{{$q->Holiday}}</td>
                <td>{{$q->Cargo}}</td>
             </tr>

        @endforeach
        </tbody>

    </table>

@endsection
