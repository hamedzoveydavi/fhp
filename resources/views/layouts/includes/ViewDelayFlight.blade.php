@extends('layouts.app')


@section('content')


    @foreach($data as $q)
     {{$q->delaycode}}
     @endforeach


    @endsection
