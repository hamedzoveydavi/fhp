@extends('layouts.app')


@section('content')

    <style>
        table{
            width: 100%;
            font-family: Tahoma;
            font-size: small;
            text-align: center;
        }
        table,td,th{
            border: 1px solid black;
        }

        th{
            height: 30px;
            background-color: silver;
        }
    </style>

       <table class="table-hover">

           <thead >
           <th colspan="9" >Information</th>
           <th colspan="4" >Departure</th>
           <th colspan="3" >Arrival</th>
           <th  >Remark / Delay</th>
           </thead>
        <thead >

        <th style="width: 70px">Airline/Arr/Dep </th>
        <th style="width: 90px">Route </th>
        <th style="width: 40px">ATA</th>

        <th style="width: 40px">ATD</th>
        <th style="width: 40px">Ch.On</th>
        <th style="width: 50px">Ch.OFF</th>
        <th style="width: 40px">Hall</th>
        <th style="width: 60px">Gate</th>
        <th style="width: 60px">Pax</th>
        <th style="width: 50px">T(P/b)D</th>
        <th style="width: 40px">VCIP</th>
        <th style="width: 50px">WCH</th>
        <th style="width: 50px">Cargo</th>
        <th style="width: 55px">T(P/b)A</th>
        <th style="width: 40px">WCH</th>
        <th style="width: 40px">Cargo</th>
        <th >Remark</th>

        </thead>
        <tbody >

        @foreach($dataInfo as $info)

              <tr
              @switch($info->StatusFlight)
                @case ('InTime')
                    style="background-color: #0c80d8"
                    @break
                @case('Delay')
                    style="background-color: orangered"
                    @break
                @endswitch >

                 <td>
                     <a class="dropdown-item" href="{{route('SelectInfo',['id'=>$info->id])}}" >
                        {{ $info->Airline }}/{{$info->Arr_No}}/{{$info->Dep_No}}
                    </a>

                 </td>

                <td>{{$info->Arrival}}-{{ $info->From }}-{{$info->To}}</td>
                <td>{{ $info->ATA }}</td>
                <td>{{ $info->ATD }}</td>
                <td>{{ $info->ChocksOn }}</td>
                <td>{{ $info->ChocksOf }}</td>
                <td>{{ $info->Hall }}</td>
                <td>{{ $info->Gate }}</td>
                <td>{{ $info->ADL_Dep }}/{{ $info->CHD_Dep }}/{{ $info->INF_Dep }}</td>
                <td>{{ $info->TBD_Dep }}/{{ $info->TPD_Dep }}</td>
                <td>{{ $info->VCIP_Dep }}</td>
                <td>{{ $info->WCH_Dep }}</td>
                <td>{{ $info->WeightCargoDep }}</td>
                <td>{{ $info->TPA_ARR }}/{{ $info->TBA_ARR }}</td>
                <td>{{ $info->WCH_ARR }}</td>
                <td>{{ $info->WeightCargoArr }}</td>
                <td>{{ $info->Remark }}<br>
                 <a class="dropdown-item" href="{{Route('SelectInfo',['id'=>$info->id])}}'">
                 <?php
                      $sum=0;
                        $tbl = App\DelayFlight::where('flightid',$info->id)->select('delaycode','DelayTime')->get();
                            foreach ($tbl as $dt){
                              $sum += $dt->DelayTime ;
                             }
                             if($sum > 0){
                                echo 'Time :'. $sum .'MIN';
                             }
                          ?>
                </a>
                </td>


            </tr>

        @endforeach


        </tbody>

    </table>



@endsection


