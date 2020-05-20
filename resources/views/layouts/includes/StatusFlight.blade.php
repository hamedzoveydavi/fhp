@extends('layouts.app')

@section('content')


    <table style="top: 10px" {{--class="table table-hover"--}}>

        <thead {{--class="table-primary"--}}>
        <tr>
            <th scope="row">No</th>
            <th scope="col">Airline</th>
            <th scope="col">Arr_No</th>
            <th scope="col">Dep_No</th>

            <th scope="col">Reg</th>
            <th scope="col">Type</th>
            <th scope="col">DES</th>

            <th scope="col">ETA</th>
            <th scope="col">ETD</th>
            <th scope="col">Date</th>


            <th scope="col">Status</th>
            <th scope="col">Action</th>

        </tr>

        </thead>
        <tbody>



        @foreach( $StatusFlight as $c)


                <TD>{{ $c->id }}</TD>

                <td>{{ $c->Airline }}</td>
                <td>{{ $c->Arr_No }}</td>
                <td>{{ $c->Dep_No }}</td>

                <td>{{ $c->Reg }}</td>
                <td>{{ $c->Type }}</td>
                <td> {{$c->From}}-{{ $c->To }} </td>

                <td>{{ $c->ETA }}</td>

                <td>{{ $c->ETD }}</td>
                <td>{{ $c->Date_ETD }}</td>

                <td>
                    @switch ($c->Status)
                         @case (1)
                            <b><span style="color: red">Closed</span></b>
                            @break
                         @case (0)
                            <b><span style="color: green">Open</span></b>
                            @break
                         @case (-1)
                            <b><span style="color: silver">Cancel</span></b>
                            @break
                    @endswitch

                </td>
                <td>

                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Status
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{Route('EditStatusToOpen',['id'=>$c->id])}}">Open</a>
                            <a class="dropdown-item" href="{{Route('EditStatusToClose',['id'=>$c->id])}}">Close</a>
                            <a class="dropdown-item" href="{{Route('EditStatusToCancel',['id'=>$c->id])}}">Calncel</a>

                        </div>
                    </div>

                </td>

            </tr>
        @endforeach
        </tbody>

    </table>







@endsection
