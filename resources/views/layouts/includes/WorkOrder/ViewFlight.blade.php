@extends('layouts.app')

@section('content')

    <table class="table table-hover"  >

        <thead class="table-primary table table-bordered" >

        <th >Airline </th>
        <th >FlightDate</th>
        <th >Arr.No</th>
        <th >Dep.No</th>
        <th >ETA</th>
        <th >ETD</th>
        <th >From</th>
        <th >To</th>
        <th >Type</th>
        <th >Reg</th>

        </thead>
        <tbody style="font-size: 2px;">
    @foreach($data as $q)
                <tr>
                    <td>


                        <a class="dropdown-item" href="{{ route('EquipmentView',['id'=>$q->id]) }}"
                          {{--onclick="event.preventDefault();
                            document.getElementById('vf-form').submit();"--}}>
                            <u><b>{{$q->id}}</b></u>
                        </a>

                       {{-- <form id="vf-form" action="{{ route('EquipmentView') }}" method="POST" --}}{{--style="display: none;"--}}{{-->
                            @csrf
                           <input name="id" value="{{$q->id}}">
                        </form>--}}

                        </td>

                    <td>{{$q->Date_ETD}}</td>
                    <td>{{$q->Arr_No}}</td>
                    <td>{{$q->Dep_No}}</td>
                    <td>{{$q->ATA}}</td>
                    <td>{{$q->ATD}}</td>
                    <td>{{$q->From}}</td>
                    <td>{{$q->To}}</td>
                    <td>{{$q->Type}}</td>
                    <td>{{$q->Reg}}</td>

                </tr>

    @endforeach
        </tbody>

    </table>

@endsection
