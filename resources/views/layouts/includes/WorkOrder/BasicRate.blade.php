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

    </style>
    <div class="groupbox-shadow">
        @if(!empty($fetchdata))
            <form method="post" action="{{Route('BasicRateUpdate')}}">
                <input type="text" name="id" value="<?php if(!empty($fetchdata)){ echo $fetchdata->id ; } ?>" style="display: none">
                @csrf
                    @else
                <form method="post" action="{{Route('BasicRateInsert')}}">
             @csrf
                    @endif

            @include('layouts.includes.flash-message')



            <div  class="input-group" style="width: 80%; margin: 5px 10px 10px 10px">
                <div  class="input-group-prepend">
                    <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Basic Rate Subject</label>
                </div>
                <input id="Subject" style="text-align: center;width: 150px" type="text" class="form-control @error('MinGroundTime') is-invalid @enderror"  name="Subject"
                       value="<?php if(!empty($fetchdata)){ echo $fetchdata->Subject ; } ?>" >

                @error('MinGroundTime')
                <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                @enderror
            </div>

            <div  class="input-group" style="width: 300px; margin: 5px 10px 10px 10px">
                <div  class="input-group-prepend">
                    <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Basic Rate Percent</label>
                </div>
                <input id="Percent" style="text-align: center;width: 70px" type="text" class="form-control @error('MinGroundTime') is-invalid @enderror"  name="Percent"
                       value="<?php if(!empty($fetchdata)){ echo $fetchdata->Percent ; } ?>" >
                <div  class="input-group-prepend">
                    <label style="border-radius:0 15px 15px 0;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">%</label>
                </div>
                @error('MinGroundTime')
                <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                @enderror
            </div>


            <div style="margin-left: 30%;padding-bottom: 10px">
                @if(!empty($fetchdata))
                    <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-update"></i>     <i> Update</i> </button>
                    @else
                    <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-save"></i>     <i> Save</i> </button>
            @endif
            </div>
        </form>



    </div>

    <br>
    @if(!empty($fetchdata))
        <table style="width: 100%;text-align: center"  class="table table-bordered table-hover">
            <thead class="table-primary" >
            <tr>
                <th scope="col">Action</th>
                <th scope="col" style="text-align: center">Percent</th>
                <th scope="col">Subject</th>
                <th scope="row">No</th>
            </tr>
            </thead>
        </table>
        @else

    <table style="width: 100%;text-align: center"  class="table table-bordered table-hover">
        <thead class="table-primary" >
        <tr>
            <th scope="col">Action</th>
            <th scope="col" style="text-align: center">Percent</th>
            <th scope="col">Subject</th>
            <th scope="row">No</th>
        </tr>
        </thead>
        <tbody>

        @foreach($Eqdata as $c)
            <tr>
                <td> <a href="{{Route('BasicRateViewForUpdate',['id'=>$c->id])}}"><img src="images/edit.png"></a>
                    <a id="delete"  href="{{Route('ServiceDelete',['serid'=>$c->id])}}"> <img src="images/delete.png"></a></td>
                <td style="text-align: center">{{ $c->Percent }}</td>
                <td style="text-align: right">{{ $c->Subject }}</td>
                <td>{{ $c->id }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @endif

@endsection
