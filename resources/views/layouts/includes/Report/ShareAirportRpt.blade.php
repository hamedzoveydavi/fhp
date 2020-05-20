@extends('layouts.app')
    @section('content')

</div>
    <table >
         <thead >
        
        <th scope="col">Airline</th>
        <th scope="col">Arr_No</th>
        <th scope="col">Dep_No</th>
        <th scope="col">Reg</th>
        <th scope="col">Type</th>
        <th scope="col">Route</th>
        <th scope="col">Precent</th>
        <th scope="col">Price(ریال)</th>
        
        </thead>
        <tbody>
        @if(!empty($data))
        @foreach($data as $list)
    
        <tr>
        
        <td>{{$list->Airline}}</td>
        <td>{{$list->Arr_No}}</td>
        <td>{{$list->Dep_No}}</td>
        <td>{{$list->Reg}}</td>
        <td>{{$list->Type}}</td>
        <td>@if(!empty($list->Arrival)) {{$list->Arrival}}- @endif {{$list->From}}-{{$list->To}}</td>
        <td> @if(!empty($list->Arr_No) && !empty($list->Dep_No))<b style="color:green;text-align:left">(100%)</b> 
                @elseif (empty($list->Arr_No) && !empty($list->Dep_No))<b style="color:red">(50%)</b> 
                @elseif (!empty($list->Arr_No) && empty($list->Dep_No))<b style="color:red">(50%)</b> 
                @endif</td>
        <td>
            
            {{number_format($list->price)}}
            </td>
       
        </tr>

        @endforeach
        <tr >
        <td colspan="7" style="font-family:'B Titr';font-size: 20px;text-align:right"> جمع :</td>

        <td style="background-color:red"><b><?php $sum=0 ;foreach ( $data as $Sumdata){$sum += $Sumdata->price ;}echo number_format($sum);?></b></td>
        

    </tr>
        @endif
        </tbody>
        </table>

    @endsection