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


           <a style="border-radius: 5px;" class="btn btn-success" href="{{ Route('CreateFlight') }}" >
               Create Flight   <img style="width: 25px;margin-left: 10px" src="images/add-icon.png">
           </a>

       <br><br>

    <table  class=" table-hover">
         <thead >

        <th scope="row">No</th>
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
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

        </tr>

        </thead>
        <tbody>

        @foreach( $tblflight as $c)

            <tr>
                <TD >
                    @switch ($c->Status)
                        @case (0)
                        <b> <u>
                                  <a class="dropdown-item" href="{{ route('SelectInfo',['id'=>$c->id])}}">
                                        {{ $c->id }}
                                    </a>
                         </u></b>

                        @break
                        @case (1)
                        <b>
                            <a style="opacity:0.5" disbled >
                                {{ $c->id }}
                            </a></b>

                        @break
                        @case (-1)
                        <b>
                            <a style="opacity:0.5" disbled >
                                {{ $c->id }}
                            </a></b>
                        @break
                    @endswitch
                </TD>

                <td>{{ $c->Airline }}</td>
                <td>{{ $c->Arr_No }}</td>
                <td>{{ $c->Dep_No }}</td>

                <td style="font:9px Arial">{{ $c->Reg }}</td>
                <td>{{ $c->Type }}</td>
                <td style="font:9px Arial">{{$c->Arrival}}-{{ $c->From }}-{{ $c->To }} </td>

                <td>{{ $c->ETA }}( {{ $c->Date_ETA }} )</td>

                <td>{{ $c->ETD }}( {{ $c->Date_ETD }} )</td>
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
                <td>
                    @switch ($c->Status)

                        @case (0)

                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault();
                                                     document.getElementById('fltedit-form').submit();">
                            <img src="images/edit.png" >
                        </a>

                        <form id="fltedit-form" action="{{ route('view-flight')}}" method="POST" style="display: none;">
                            @csrf
                            <input name="id" value="{{$c->id}}">
                        </form>
                        @break
                        @case (1)
                        <img src="images/edit.png" style="opacity:0.5" disbled >
                        @break
                        @case (-1)
                        <img src="images/edit.png" style="opacity:0.5" disbled >
                        @break
                    @endswitch



                </td>
                <td>
                    @switch ($c->Status)

                        @case (0)

                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault();
                                                     document.getElementById('fltdel-form').submit();">
                            <img src="images/delete.png">
                        </a>

                        <form id="fltdel-form" action="{{ route('delete-flight')}}" method="POST" style="display: none;">
                            @csrf
                            <input name="id" value="{{$c->id}}">
                        </form>
                        @break
                        @case (1)
                        <img src="images/delete.png" style="opacity:0.5" disbled>
                        @break
                        @case (-1)
                        <img src="images/delete.png" style="opacity:0.5" disbled>
                        @break
                    @endswitch
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>



@endsection


