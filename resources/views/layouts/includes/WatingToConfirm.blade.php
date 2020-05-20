@extends('layouts.app')


@section('content')
  <style>
     .wait{
         height:200px ;
          border: 1px black solid;
          box-shadow: #636b6f;
          border-radius: 5px;
          background:#00c689 ;
          font-family: "B Titr";
          font-size:16px;
         text-align: center;
         margin-top: 10px;
      }
  </style>
    <div class="wait">
        لطفاً تا تاییدیه نهایی منتظر بمانید
    </div>

    @endsection
