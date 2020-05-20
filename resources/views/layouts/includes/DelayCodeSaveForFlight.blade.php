
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flight Watch') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-------------------------------------------------------------------------------------------}}
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fily Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset ('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset ('vendors/css/vendor.bundle.base.css') }}">
    <!--===============================================================================================-->
</head>

<body>

<div style="margin-left: 40px;margin-top: 20px;">
<form method="post" action="{{Route('FlightDelayCodeSave')}}">
    @csrf
    <div style="width: 410px">
        <input type="text" name="FlightID" value="{{$_REQUEST['id']}}" style="display: none">
    </div>
    <br>
        @component('components.textCoor',[
                                        'name'=>'DelayCode',
                                        'is_insert'=>true,
                                        'is_Calendar'=>false
                                         ])
        @endcomponent

      @component('components.textCoor',[
                                       'name'=>'DelayTime',
                                       'is_insert'=>true,
                                       'is_Calendar'=>false
                                        ])
        @endcomponent
        <div style="margin-left: 100px">
            <button style="width: 150px" type="submit" class="btn btn-success">Save</button>
        </div>
        <br>
 </form>

    @include('layouts.includes.flash-message')

    </div>
</body>
</html>

