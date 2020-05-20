@extends('layouts.app')

@section('content')

    @include('layouts.includes.flash-message')
        <div class="groupbox-shadow" style="height: 65px">
            <form method="post" action="{{Route('objList')}}">
                @csrf
        <input style="width: 400px" type="text" placeholder="Insert Personal Code :" name="perid">
        <button type="submit" class="btn btn-success" >Search</button>
            </form>
        </div>
        </br>

    <div class="divTable">
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell" style="width: 50%;border: 1px solid black">
                    <form method="post" action="{{Route('Addobjacc')}}">
                        @csrf
<br><br><br><br>
                        <div class="groupbox-shadow" style="text-align: left">
                            @if (!empty($objacc))
                                @foreach($objacc as $obj)
                                    <input type="checkbox" name="check_list[]" value="{{$obj->objectacc}}">{{$obj->objectacc}} <br>
                                @endforeach
                            @endif
                                @if(!empty($uid))
                                    <input type="text" name="uid" value="{{$uid}}" style="visibility: hidden">
                                @endif
                        </div>
                        <br>
                        <div style="text-align: center">
                        <button  style="width: 150px;border-radius: 5px" type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>


                </div >
                <div class="divTableCell" style="width: 50%;border: 1px solid black">
                   {{-- <div class="groupbox-shadow" style="padding-top: 10px;margin-top: 10px">--}}
                    @if(!empty($uid))
                    <?php
                    $UserProfie =\App\Profile::where('userid',$uid)->select()->first();
                    $destinationPath = 'User_image/'.$UserProfie->Img;
                     ?>
                    <div style="text-align: center">
                    <img style="width: 100px;height: 100px;border-radius: 25px;" id="img_saved" src="<?php echo $destinationPath; ?>" alt="profile">
                    </div><br>
                    <input  style="text-align: right" type="text" id="datepicker-normal" name="Name" value="{{$UserProfie->Name}}"  placeholder="Name" disabled /><br>
                    <input  style="text-align: right" type="text" id="datepicker-normal" name="Name" value="{{$UserProfie->Family}}"  placeholder="Name" disabled />
                    <input   type="text" id="datepicker-normal" name="Name" value="{{$UserProfie->Username}}"  placeholder="Name" disabled />
                    <input   type="text" id="datepicker-normal" name="Name" value="{{$UserProfie->Percode}}"  placeholder="Name" disabled />
                    <input   type="text" id="datepicker-normal" name="Name" value="{{$UserProfie->Station}}"  placeholder="Name" disabled />
                    <input   type="text" id="datepicker-normal" name="Name" value="{{$UserProfie->Unit}}"  placeholder="Name" disabled />
                    <input   type="text" id="datepicker-normal" name="Name" value="{{$UserProfie->Position}}"  placeholder="Name" disabled />

                    @endif
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>






    @endsection
