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

    <table  class=" table-hover">
        <thead >


        <th scope="col">Airline</th>
        <th scope="col">Arr_No</th>
        <th scope="col">Dep_No</th>

        <th scope="col">Reg</th>
        <th scope="col">Type</th>
        <th scope="col">Route</th>

        <th scope="col">ETA</th>
        <th scope="col">ETD</th>

        <th scope="col">P_P</th>

        <th scope="col">Status</th>


        </tr>

        </thead>
        <tbody>
        @foreach( $tblflight as $c)

            <tr>


                <td>{{ $c->Airline }}</td>
                <td>{{ $c->Arr_No }}</td>
                <td>{{ $c->Dep_No }}</td>

                <td>{{ $c->Reg }}</td>
                <td>{{ $c->Type }}</td>
                <td>{{ $c->From }} - {{ $c->To }} </td>

                <td>{{ $c->ETA }}( {{ $c->Date_ETA }} )</td>

                @if( $c->Date_ETD  == date('20y-m-d'))
                <td>{{ $c->ETD }}( {{ $c->Date_ETD }} )</td>
                @else
                    <td></td>
                @endif
                <td>{{ $c->Pos_Park }}</td>

                <td>

                    @switch ($c->Status)
                        @case (0)
                        <b><span style="color: green">Open</span></b>
                        @break
                        @case (1)
                        <b><span style="color: red">Close</span></b>
                        @break
                        @case (-1)
                        <b><span style="color: silver">Cancel</span></b>
                        @break
                    @endswitch
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>



@endsection


