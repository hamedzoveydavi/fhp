<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'Flight Program Handling') }}</title>--}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>

   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-------------------------------------------------------------------------------------------}}
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flight Program Handling</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset ('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset ('vendors/css/vendor.bundle.base.css') }}">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset ('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset ('favicon.png') }}" />
    <link href="{{asset('css/theme.min.css')}}" rel="stylesheet" type="text/css">
{{---------------------------------ChartScript-----------------------------------------------------------}}
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <!--===============================================================================================-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 </head>
<body>

<?php
    use App\Profile;
    use App\ConfirmmUser;

    $userid = Auth::user()->id;
    $uname =Auth::user()->name;
   // $ActiveUser = ConfirmmUser::where('userid',$userid)->first();
    $idno = Profile::where('Username',$uname)->count();
    $imagid = Profile::where('Username',$uname)->first();

    ?>

<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
<b style="color: #c0ddf6 "> Flight Program Handling 2020</b>
{{-- <img src="{{asset('images/logo.png') }}" alt="logo"/>--}}
{{--<a class="navbar-brand brand-logo-mini" href="#"><img src="{{asset('images/logo.png') }}" alt="logo"/></a>--}}
</div>


<div class="navbar-menu-wrapper d-flex align-items-center">

@if ($idno > 0 )
<?php /*echo $ActiveUser->confirm; */?>

{{--<div style="position: absolute;float: left;width: 300px;height: 50px;background: silver;border-radius: 25px;">
        <form method="post" action="{{Route('Flightdatasearch')}}">
            @csrf

        <input id="search-input-nav-app" type="date" class="input input__icon  form-control " name="SearchInfo" id="Search"  >
            <button type="submit"  id="search-button-nav-app"><i class="mdi mdi-magnify mx-0"></i></button>
        </form>
    </div>--}}
   @endif

        <ul class="navbar-nav navbar-nav-right">
           <li class="nav-item dropdown mr-1">
              {{-- <li style="background-color: orangered;border-radius: 15px;font-size: 12px;">10</li>--}}
                <a class="nav-link count-indicator " href="#"  >
                    <i class="mdi mdi-email mx-0"></i>

                </a>
                </li>

            <li class="nav-item dropdown mr-4">
                <a  class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell mx-0"></i>
                </a>
            </li>

            <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
                <a class="nav-link">

                     @if ($idno > 0 && !empty($imagid->Img) /*&& $ActiveUser->confirm == '1'*/)
                       <?php $destinationPath = 'User_image/'.$imagid->Img;?>
                         @elseif($idno > 0 & empty($imagid->Img))
                        <?php $destinationPath ='User_image/default.png'; ?>
                         @elseif($idno == 0 )
                        <?php $destinationPath ='User_image/default.png'; ?>
                      @endif
                  <img src="<?php echo $destinationPath; ?>" alt="profile">
                </a>
            </li>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>


            <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                 <i class="mdi mdi-dots-vertical"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>


    @if ($idno > 0 /*&& $ActiveUser->confirm == '1'*/)

<!-- partial -->
<div class="container-fluid page-body-wrapper">

    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item "  >
                <?php $acc1 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Home')->select(1)->count();?>
                <a class="nav-link"  href="{{ route('home') }}"
                <?php  if ($acc1 > 0)
                    echo ('style ="visibility: visible"');
                else
                    echo ('style ="visibility: hidden"'); ?>
                >
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Home</span>
                </a>
                <?php $acc2 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ViewPlan')->select(1)->count();?>
                <a  name="ViewPlan" class="nav-link" href="{{ route('ViewPlan') }}"
                <?php  if ($acc2 > 0)
                   echo ('style ="visibility: visible"');
                     else
                       echo ('style ="visibility: hidden"'); ?>
                >
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Plan</span>
                </a>
            </li>

            <?php $acc20 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Admin')->select(1)->count();?>
            <li class="nav-item <?php  if ($acc20 == 0){
                  echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#AccList" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-palette menu-icon"></i>
                    <span class="menu-title">Admin</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="AccList">
                    <ul class="nav flex-column sub-menu">
                        <?php $acc12 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ConfirmUser')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc12 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{route('ConfirmUser')}}">ConfirmUsers</a></li>
                        <?php $acc17 = \App\Accessory::where('userid',$userid)->where('AccessoryName','AccListNotAdded')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc17 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{route('objacc')}}">Access</a></li>
                            <?php $acc18 = \App\Accessory::where('userid',$userid)->where('AccessoryName','UserProfileList')->select(1)->count();?>
                            <li class="nav-item <?php  if ($acc18 == 0){
                                echo ('hide');}?>"> <a class="nav-link" href="{{route('userlist')}}">UserList</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#Profile" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-palette menu-icon"></i>
                    <span class="menu-title">Account</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="Profile">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('ShowProfile')}}">Edit Profile</a></li>

                    </ul>
                </div>
            </li>


            <?php $acc30 = \App\Accessory::where('userid',$userid)->where('AccessoryName','BaseInfo')->select(1)->count();?>
            <li class="nav-item <?php  if ($acc30 == 0){
            echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#BaseInfo" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-palette menu-icon"></i>
                    <span class="menu-title">Base Info</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="BaseInfo">


                        <ul class="nav flex-column sub-menu " >

                            <?php $acc23 = \App\Accessory::where('userid',$userid)->where('AccessoryName','StationList')->select(1)->count();?>
                            <li class="nav-item <?php  if ($acc23 == 0){
                            echo ('hide');}?>"  ><a class="nav-link" href="{{route('StationList')}}"
                                >Station List</a></li>

                                <?php $acc24 = \App\Accessory::where('userid',$userid)->where('AccessoryName','AircraftTypeList')->select(1)->count();?>
                                <li class="nav-item <?php  if ($acc24 == 0){
                                echo ('hide');}?>"  ><a class="nav-link" href="{{route('AircraftTypeList')}}"
                                    >AircraftType List</a></li>


                                <?php $acc25 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ShareAirportList')->select(1)->count();?>
                                <li class="nav-item <?php  if ($acc24 == 0){
                                echo ('hide');}?>"  ><a class="nav-link" href="{{route('ShareAirportList')}}"
                                    >ShareAirport List</a></li>

                            <?php $acc3 = \App\Accessory::where('userid',$userid)->where('AccessoryName','BasicRate')->select(1)->count();?>
                            <li class="nav-item <?php  if ($acc3 == 0){
                            echo ('hide');}?>"  ><a class="nav-link" href="{{route('BasicRateView')}}"
                                >Basic Rate</a></li>


                        <?php $acc31 = \App\Accessory::where('userid',$userid)->where('AccessoryName','CargoBase')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc31 == 0){
                        echo ('hide');}?>"  ><a class="nav-link" href="{{route('CargoBase')}}"
                            >Cargo Base</a></li>


                            <?php $acc35 = \App\Accessory::where('userid',$userid)->where('AccessoryName','DelayTime')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc35 == 0){
                        echo ('hide');}?>"  ><a class="nav-link" href="{{route('DelayTimeBase')}}"
                            >Delay Time</a></li>
                    </ul>

                </div>
            </li>



            <?php $acc13 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Contract')->select(1)->count();?>
            <li class="nav-item <?php  if ($acc13 == 0){
                echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#Contract" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-palette menu-icon"></i>
                    <span class="menu-title">Contract</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="Contract">
                    <ul class="nav flex-column sub-menu " >
                        <?php $acc3 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ContractForm')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc3 == 0){
                            echo ('hide');}?>"  ><a class="nav-link" href="{{route('Contract')}}"
                            >Contract Form</a></li>
                    </ul>
                </div>
                <div class="collapse" id="Contract">
                    <ul class="nav flex-column sub-menu " >
                        <?php $acc33 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ContractList')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc33 == 0){
                            echo ('hide');}?>"  ><a class="nav-link" href="{{route('ContactList')}}"
                            >Contract List</a></li>
                    </ul>
                </div>
            </li>



            <?php $acc13 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Form')->select(1)->count();?>
              <li class="nav-item <?php  if ($acc13 == 0){
                  echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-palette menu-icon"></i>
                    <span class="menu-title">Forms</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">

                    <ul class="nav flex-column sub-menu " >

                        <?php $acc4 = \App\Accessory::where('userid',$userid)->where('AccessoryName','CreateFlight')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc4 == 0){
                            echo ('hide');}?>"  > <a class="nav-link" href="{{route('CreateFlight')}}">Create Flight</a></li>

                            <?php $acc5 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Delay Form')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc5 == 0){
                            echo ('hide');}?>"  > <a class="nav-link" href="{{route('ViewDelayCodeTable')}}">Delay Form</a></li>
                    </ul>
                </div>
            </li>
            <?php $acc14 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ViewFlight')->select(1)->count();?>
            <li class="nav-item <?php  if ($acc14 == 0){
                echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                    <i class="mdi mdi-layers menu-icon"></i>
                    <span class="menu-title">View Flight</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-advanced">
                    <ul class="nav flex-column sub-menu">
                        <?php $acc6 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Plan')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc6 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{Route('home')}}">Plan</a></li>
                            <?php $acc7 = \App\Accessory::where('userid',$userid)->where('AccessoryName','PlanInfo')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc7 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{Route('ViewFlightInfo')}}">Flight Info</a></li>

                    </ul>
                </div>
            </li>
            <?php $acc15 = \App\Accessory::where('userid',$userid)->where('AccessoryName','WorkOrder')->select(1)->count();?>
            <li class="nav-item  <?php  if ($acc15 == 0){
                echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                    <i class="mdi mdi-view-headline menu-icon"></i>
                    <span class="menu-title">Work Order</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <?php $acc8 = \App\Accessory::where('userid',$userid)->where('AccessoryName','FlightClose')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc8 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{route('FlightClosed')}}">Flight Closed</a></li>
                        </ul>
                </div>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <?php $acc19 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ViewEq')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc19 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{route('ViewEq')}}">ViewEqList</a></li>
                    </ul>
                </div>

            </li>
            <?php $acc16 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Editors')->select(1)->count();?>
            <li class="nav-item <?php  if ($acc16 == 0){
                echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
                    <i class="mdi mdi-pencil-box-outline menu-icon"></i>
                    <span class="menu-title">Editors</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="editors">
                    <ul class="nav flex-column sub-menu">
                        <?php $acc9 = \App\Accessory::where('userid',$userid)->where('AccessoryName','StatusFlight')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc9 == 0){
                            echo ('hide');}?>"><a class="nav-link" href="{{Route ('ViewFlightStatus')}}">Status Flight</a></li>

                    </ul>
                </div>
            </li>
            <?php $acc17 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Report')->select(1)->count();?>
            <li class="nav-item <?php  if ($acc17 == 0){
                echo ('hide');}?>">
                <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                    <i class="mdi mdi-chart-pie menu-icon"></i>
                    <span class="menu-title">Reports</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                        <?php $acc10 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Chart')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc10 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{Route('Chart')}}">Chart 1</a></li>
                            <?php $acc11 = \App\Accessory::where('userid',$userid)->where('AccessoryName','Report')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc11 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{Route('GetDataFlightReport')}}">Report</a></li>

                    <?php $acc32 = \App\Accessory::where('userid',$userid)->where('AccessoryName','ShareAirortRpt')->select(1)->count();?>
                        <li class="nav-item <?php  if ($acc32 == 0){
                            echo ('hide');}?>"> <a class="nav-link" href="{{Route('ShareAirortRpt')}}">ShareAirortRpt</a></li>    
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    @else
        <div class="container-fluid page-body-wrapper">
             <nav class="sidebar sidebar-offcanvas" id="sidebar">
                 <li class="nav-item">
                     <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                         <i class="mdi mdi-palette menu-icon"></i>
                         <span class="menu-title">Forms</span>
                         <i class="menu-arrow"></i>
                     </a>
                     <div class="collapse" id="ui-basic">
                         <ul class="nav flex-column sub-menu">
                             <li class="nav-item"> <a class="nav-link" href="{{route('Profile')}}">Profile</a></li>

                         </ul>
                     </div>
                 </li>
             <ul class="nav">
        </ul>
    </nav>
   @endif




    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card bg-white">
                        {{--<div class="card-body d-flex align-items-center justify-content-between">--}}
                        <div class="card-body justify-content-between">
                            @include('sweetalert::alert')
                            @yield('content')
                     </div>
                 {{--</div>--}}
              </div>
            </div>


<!-- page-body-wrapper ends -->
        </div>
        </div>
    </div>
</div>

</body>
</html>
