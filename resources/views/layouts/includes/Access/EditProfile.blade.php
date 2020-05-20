@extends('layouts.app')


@section('content')

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <style type="text/css" >
        @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
        @import url("https://fonts.googleapis.com/css?family=Roboto");
        label{
            font-family: Tahoma;
            font-size: 12px;
        }

        .thumb-image{
            float:left;width:100px;
            position:relative;
            padding:5px;
        }
    </style>



    @foreach($user as $users)
    <div class="divTable" style="width: 100%; border: 0px solid #000;">
        <div class="divTableBody">

            <div class="divTableRow" >
                <div class="divTableCell" style="float: left; width: 55%;padding: 0 50px 50px 50px;text-align: center">
                    <div style="padding-top: 35px;">
                        <div class="container">
                            <form id="file-upload-form" class="uploader" action="{{Route('UpdateProfile')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                @csrf
                                <div id="wrapper" style="margin-top: 20px;">
                                    <input id="file-upload" multiple="multiple" name="fileUpload"  type="file"  />
                                    <label for="file-upload" id="file-drag">
                                        <div  id="image-holder" style="margin-left: 150px"></div>
                                                <?php $destinationPath = 'User_image/'.$users->Img;?>
                                                <img style="width: 100px;height: 100px;border-radius: 15px" id="img_saved" src="<?php echo $destinationPath; ?>" alt="profile">
                                        <div id="start" >
                                            {{--<i id="image-down" class="fa fa-download" aria-hidden="true"></i>
                                             <div id="txt-select" > Select a file or drag here</div>
                                             <div id="notimage" class="hidden">Please select an image</div>--}}
                                            <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                            <br>
                                            <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                                        </div>
                                    </label>
                                    <div id="image-holder" value="{{$users->Img}}"></div>
                                </div>
                        </div>
                    </div>
                </div>


                <div class="divTableRow">
                    <div class="divTableCell"></div>
                    <div class="divTableCell"  ><b><label  for="name" >Personel Code :</label></b></div>
                    <div class="divTableCell" style="width: 65%"><input  type="text" id="datepicker-normal" name="PerCode" value="{{$users->Percode}}" placeholder="Personel Code"/></div>
                    <div class="divTableCell">&nbsp;</div>
                </div>

                <div class="divTableRow">
                    <div class="divTableCell"></div>
                    <div class="divTableCell"  ><b><label  for="name" >Name :</label></b></div>
                    <div class="divTableCell" style="width: 65%"><input  type="text" id="datepicker-normal" name="Name" value="{{$users->Name}}"  placeholder="Name"  /></div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell" ><b> <label  for="Family" >Family :</label> </b></div>
                    <div class="divTableCell"><input  type="text" id="datepicker-normal" name="Family" value="{{$users->Family}}" placeholder="Famliy" /></div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell" ><b> <label  for="NCode" >National Cod :</label> </b></div>
                    <div class="divTableCell"><input  type="text" id="datepicker-normal" name="Ncode" value="{{$users->Ncode}}" placeholder="National Cod" /></div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="divTableRow">

                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell" ><b> <label>Station :</label> </b></div>
                    <div class="divTableCell">
                        <select name="Station">
                            {{--<option name="Station" hidden value="{{$users->Station}}" disabled selected>{{$users->Station}}</option>--}}
                            <option name="Station"  value="{{$users->Station}}" >{{$users->Station}}</option>
                            <option name="Station" value="THR">THR</option>
                            <option name="Station" value="IKA">IKA</option>
                            <option name="Station" value="ISF">ISF</option>
                            <option name="Station" value="KIS">KIS</option>
                            <option name="Station" value="AHW">AHW</option>
                        </select>
                    </div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="divTableRow">

                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell" ><b> <label>Unit :</label> </b></div>
                    <div class="divTableCell" >

                        <select name="Unit">
                            {{--<option name="Unit" hidden value="{{$users->Unit}}" disabled selected>{{$users->Unit}}</option>--}}
                            <option name="Unit"  value="{{$users->Unit}}" >{{$users->Unit}}</option>
                            @foreach($UnitsName as $unit)
                                <option name="Unit">{{$unit->NameUnit}}</option>
                            @endforeach
                        </select></div>
                    <div class="divTableCell">&nbsp;</div>
                </div>
                <div class="divTableRow">

                    <div class="divTableCell">&nbsp;</div>
                    <div class="divTableCell" ><b> <label  for="Family" >Position :</label> </b></div>
                    <div class="divTableCell">
                        <select name="Position">
                            {{--<option name="Position" hidden value="{{$users->Position}}" disabled selected>{{$users->Position}}</option>--}}
                            <option name="Position" value="{{$users->Position}}">{{$users->Position}}</option>
                            <?php
                            $pp = DB::select(DB::raw("(select PositionName from positions where Unitid in (select id from units))"))
                            ?>
                             @foreach($pp as $p)
                                <option name="Position">{{$p->PositionName}}</option>
                            @endforeach
                        </select></div>
@endforeach
                    <div class="divTableCell"></div>
                </div>

            </div>



        </div>
    </div><br>
    <div style="border: 1px solid silver;width: 70%;margin-left: 150px"></div><br>
    <div style="text-align: center">
        <button class="btn btn-success" style="width: 200px;height: 40px;border-radius: 5px;" type="submit" name="save" ><b>Finish</b></button>
    </div>
    <br>
    @include('layouts.includes.flash-message')
    </form>


    <script>
        $(document).ready(function() {
            $("#file-upload").on('change', function() {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $("#image-holder");
                var image_down = $("#image-down");
                var txt_select = $("#txt-select");
                var img_saved = $("#img_saved");
                image_holder.empty();
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof(FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++)
                        {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image"
                                }).appendTo(image_holder);
                            }
                            image_holder.show();
                            image_down.hide();
                            txt_select.hide();
                            img_saved.hide();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            });
        });
    </script>

@endsection
