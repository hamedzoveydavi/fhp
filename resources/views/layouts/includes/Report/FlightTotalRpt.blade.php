<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset ('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset ('favicon.png') }}" />
   </head>
<style>

   .table-report{
       position: absolute ;
       float: right;
       right: 40px;
       direction: rtl ;
       width: 95%;
       text-align: center ;
       top:100px ;
   }

</style>


<div style="height: 50px;text-align: center;font-family: 'B Titr';font-size:20px;">
    {{ Auth::user()->Station }} آمار پروازهای ورودی و خروجی ایستگاه
</div>
<div style="height: 50px;text-align: center;font-family: 'B Titr';font-size:14px;">
    <div style="float: right; position: absolute; left: 50%"> {{ $_POST['StartDate'] }} : از تاریخ   </div>

      <div style="float: right; position: absolute ;  left: 40%" > {{ $_POST['EndDate'] }} : تا تاریخ  </div>
</div>

<table class="{{--table table-hover --}}table-report {{--table-bordered--}}" >

       <thead {{--class="table-primary table "--}} >

        <th scope="row"><b>شرکت هواپیمایی</b></th>
        <th scope="col"><b>نوع هواپیما</b></th>
        <th scope="col"><b>تعداد پروازهای ورودی</b></th>
        <th scope="col"><b>تعداد پروازهای خروجی</b></th>
        <th scope="col"><b>پرواز ON</b></th>
        <th scope="col"><b>پرواز IT</b></th>
        <th scope="col"><b>تعداد مسافر خروجی</b></th>
        <th scope="col"><b>تعداد مسافر ورودی</b></th>
        <th scope="col"><b>تعداد مسافر خدمات ویژه</b></th>
        <th scope="col"><b>وزن بار ورودی</b></th>
        <th scope="col"><b>وزن بار خروجی</b></th>

        </tr>

        </thead>
        <tbody>

    @foreach( $dataflight as $c)
        <tr>
           <td><b>{{ $c->Airline }}</b></td>
           <td><b>{{ $c->Type }}</b></td>
            <td>{{ $c->TotalArrival }}</td>
            <td>{{ $c->TotalDeparture }}</td>
            <td>{{ $c->OnTime }}</td>
            <td>{{ $c->InTime }}</td>
            <td>{{ $c->TotalPaxdep }}</td>
            <td>{{ $c->TotalPaxArr }}</td>
            <td>{{ $c->SSP_ARR }}</td>
            <td>{{ $c->TBA }}</td>
            <td>{{ $c->TBD }}</td>
        </tr>
    @endforeach

    </tbody>
    <thead {{--class="table-primary table table-bordered"--}} style="background-color:#fcb2b2" >
    <tr >
        <td colspan="2" style="font-family:'B Titr';font-size: 20px;">جمع :</td>

        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->TotalArrival ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->TotalDeparture ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->OnTime ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->InTime ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->TotalPaxdep ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->TotalPaxArr ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->SSP_ARR ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->TBA ;}echo $sum;?></b></td>
        <td><b><?php $sum=0 ;foreach ( $dataflight as $data){$sum += $data->TBD ;}echo $sum;?></b></td>

    </tr>
    </thead>

</table>



</html>
