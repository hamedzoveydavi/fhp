
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
    <form method="post" action="{{Route('FlightDelayEditInf',['id'=>$delayinf->id])}}">
        @csrf
        <div style="width: 410px">
            @component('components.InputForFetch',[
                                        'name'=>'FlightID',
                                        'subject'=>'FlightID'
                                        ,'value'=>$delayinf->flightid
                                        ,'is_lock'=>true
                                         ])
            @endcomponent
        </div>
        <br>
        @component('components.InputForFetch',[
                                        'name'=>'DelayCode',
                                        'subject'=>'DelayCode',
                                        'value'=>$delayinf->delaycode
                                         ])
        @endcomponent

        @component('components.InputForFetch',[
                                         'name'=>'DelayTime',
                                        'subject'=>'DelayTime',
                                        'value'=>$delayinf->DelayTime
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

