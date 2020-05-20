@extends('layouts.app')

@section('content')

<style>
    input{
        position: absolute;
        margin-left: 23.5%;
        top: 25px;
        background-color: silver;
    }
</style>
    <div class="groupbox-shadow">

        <form method="post" action="DelayCodeEdit">
            @csrf

            <input  type="text" name="id" value="{{$_GET['id']}}" {{--disabled--}} >
            <textarea rows="4"  cols="70" style="margin-left: 25%;margin-top: 27px" name="DelayDesc" value="{{$_REQUEST['DelayDesc']}}">{{$_REQUEST['DelayDesc']}}</textarea><br>
            <button type="submit" style="margin-left: 25%" class="btn btn-success">Update</button><br>
        </form>

        <br>
    </div>
        <br>
    @include('layouts.includes.flash-message')

@endsection
