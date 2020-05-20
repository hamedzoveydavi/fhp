@extends('layouts.app')

@section('content')


    <table>
        <thead>

        <th>pic</th>
        <th>Name</th>
        <th style="width: 80px;">PersonalCode</th>
        <th style="width: 100px;">Unit</th>
        <th>Position</th>
        <th style="width: 70px;">Station</th>
        <th>Accessory</th>
        <th>Status</th>
        <th style="width: 55px">Delete</th>
        <th style="width: 55px">Edit</th>
        <th style="width: 55px">DeActive</th>


        </thead>
        <tbody>
        @foreach($ui as $user)

        @if($user->confirm == 1)
        <tr>
            @else
                <tr style="background: orangered">
                    @endif
            <td>
                @if(!empty($user->Img))
                <img style="width: 40px;height: 40px;border-radius: 25px" src="User_image/{{$user->Img}}" >
                 @else
                    <img style="width: 40px;height: 40px;border-radius: 25px" src="User_image/default.png" >
                  @endif
            </td>
            <td>{{$user->Name}} {{$user->Family}}</td>
            <td>{{$user->Percode}}</td>
            <td>{{$user->Unit}}</td>
            <td>{{$user->Position}}</td>
            <td>{{$user->Station}}</td>
            <td>{{$user->accessory}}</td>
                    @if($user->confirm == 0)
                         <td>DeActive</td>
                    @else
                        <td>Active</td>
                    @endif
            <td><a  href="#"><img src="images/delete.png"></a></td>
            <td><a  href="#"><img src="images/edit.png"></a></td>
            <td><a  href="{{Route('disableuser',['uid'=>$user->userid])}}"><img width="26px" height="26px" src="images/disable.png"></a></td>
        </tr>
        @endforeach
        </tbody>

    </table>
    @endsection
