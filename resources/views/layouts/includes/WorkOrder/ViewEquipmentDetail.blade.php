@extends('layouts.app')

@section('content')
<?php use App\BasicRate;

?>
@foreach($list as $data)
<table style="width:98%">
<thead>
<th>Station</th>
<th>Contract.No</th>
<th>GHCN NO </th>
<th>Airline</th>
<th>Type</th>
<th>Reg.Mark</th>
<th>BasicServices</th>
<th>Basic Rate</th>
</thead>
<tbody>
<tr>
<td>{{$data->From}}</td>
<td>{{$data->ContractNum}}</td>
<td>{{$data->GHCN_NO}}</td>
<td>{{$data->Airline}}</td>
<td>{{$data->Type}}</td>
<td>{{$data->Reg}}</td>
<td>  
@switch($data->BasicServices)
           @case('a') passenger Aircraft
           @break
           @case('b') Combined passenger and cargo
           @break
           @case('c') Cargo Aircraft
           @break
           @case('d') Technical Landing / ramp Handling
           @break
           @case('e') Night
           @break
           @case('f') Holiday
           @break
        @endswitch
         </td>
         <td>
         <?php  
          $bid=BasicRate::where('id',$data->BasicRateid)->first(); 
         echo($bid->Subject);
         ?>
        </td>
            </tr>
            </tbody>
            </table>
<br>

            <table id="mytable"  style="width:98%">
            <thead>
            <th colspan="3">Equipment</th> 
            <th colspan="3">Contract</th> 
            <th colspan="1">Calculate</th> 
            </thead>
            <thead>
            <th style="width:150px">Equipment Name</th>
            <th style="width:100px">Total</th>
            <th style="width:100px">Time</th>
            <th style="width:100px"> Total</th>
            <th style="width:150px"> PayPrice</th>
            <th> TotalPrice</th>
            <th>CalcPrice</th>
            </thead>
            
               <tbody>
            @foreach($services as $sr)

            @if(!empty($data->CrewCare) && $sr->ServiceName == 'CrewCare')
               <tr @if($data->CrewCare > $sr->Total)style="background-color:orange" @endif >
               <td>CrewCare</td>
               <td>{{$data->CrewCare}}</td>
               <td>{{$data->CrewCareTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span> {{number_format($data->CrewCare*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            
           @if(!empty($data->PaxCoach) && $sr->ServiceName == 'PaxCoach')
               <tr @if($data->PaxCoach > $sr->Total)style="background-color:orange" @endif>
               <td>PaxCoach</td>
               <td>{{$data->PaxCoach}}</td>
               <td>{{$data->CrewCareTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->PaxCoach*$sr->BasePay)}}</span></td>
               </tr>
            @endif
           
            
            @if(!empty($data->LOM) && $sr->ServiceName == 'LOM')
               <tr @if($data->LOM > $sr->Total)style="background-color:orange" @endif>
               <td>LOM</td>
               <td>{{$data->LOM}}</td>
               <td>{{$data->LOMTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->LOM*$sr->BasePay)}}</span></td>
               
               </tr>
            @endif
            

            @if(!empty($data->bmc) && $sr->ServiceName == 'bmc') 
               <tr @if($data->bmc > $sr->Total)style="background-color:orange" @endif>
               <td>bmc</td>
               <td>{{$data->bmc}}</td>
               <td>{{$data->bmcTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</t>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->bmc*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            
            @if(!empty($data->vipcar) && $sr->ServiceName == 'vipcar')
               <tr @if($data->vipcar > $sr->Total)style="background-color:orange" @endif>
               <td>vipcar</td>
               <td>{{$data->vipcar}}</td>
               <td>{{$data->vipcarTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->vipcar*$sr->BasePay)}}</span></td>
               </tr>
            @endif
          
            @if(!empty($data->wch) && $sr->ServiceName == 'wch')
               <tr @if($data->wch > $sr->Total)style="background-color:orange" @endif>
               <td>wch</td>
               <td>{{$data->wch}}</td>
               <td>{{$data->wchTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->wch*$sr->BasePay)}}</span></td>
               </tr>
            @endif
           
            @if(!empty($data->Gpu) && $sr->ServiceName == 'Gpu')
               <tr @if($data->Gpu > $sr->Total)style="background-color:orange" @endif>
               <td>Gpu</td>
               <td>{{$data->Gpu}}</td>
               <td>{{$data->GpuTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Gpu*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            
            
            @if(!empty($data->Acu) && $sr->ServiceName == 'Acu')
               <tr @if($data->Acu > $sr->Total)style="background-color:orange" @endif>
               <td>Acu</td>
               <td>{{$data->Acu}}</td>
               <td>{{$data->AcuTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Acu*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            

            @if(!empty($data->PushBack) && $sr->ServiceName == 'Push Back')
               <tr @if($data->PushBack > $sr->Total)style="background-color:orange" @endif>
               <td>PushBack</td>
               <td>{{$data->PushBack}}</td>
               <td>{{$data->PushBackTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->PushBack*$sr->BasePay)}}</sapn></td>
               </tr>
            @endif
            
            @if(!empty($data->cpl) && $sr->ServiceName == 'cpl')
               <tr @if($data->cpl > $sr->Total)style="background-color:orange" @endif>
               <td>cpl</td>
               <td>{{$data->cpl}}</td>
               <td>{{$data->cplTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->cpl*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            
            @if(!empty($data->Liftruck) && $sr->ServiceName == 'Liftruck')
               <tr @if($data->Liftruck > $sr->Total)style="background-color:orange" @endif>
               <td>Liftruck</td>
               <td>{{$data->Liftruck}}</td>
               <td>{{$data->LiftruckTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Liftruck*$sr->BasePay)}}</span></td>
               </tr>
            @endif
           
            @if(!empty($data->TowTractor) && $sr->ServiceName == 'TowTractor')
               <tr @if($data->TowTractor > $sr->Total)style="background-color:orange" @endif> 
               <td>TowTractor</td>
               <td>{{$data->TowTractor}}</td>
               <td>{{$data->TowTractorTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->TowTractor*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            
            @if(!empty($data->towbar) && $sr->ServiceName == 'towbar')
               <tr @if($data->towbar > $sr->Total)style="background-color:orange" @endif>
               <td>towbar</td>
               <td>{{$data->towbar}}</td>
               <td>{{$data->towbarTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->towbar*$sr->BasePay)}}</span></td>
               </tr>
            @endif
           
            @if(!empty($data->Belt) && $sr->ServiceName == 'Belt')
               <tr @if($data->Belt > $sr->Total)style="background-color:orange" @endif>
               <td>Belt</td>
               <td>{{$data->Belt}}</td>
               <td>{{$data->BeltTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Belt*$sr->BasePay)}}</span></td>
               </tr>
            @endif
           

            @if(!empty($data->Lsu) && $sr->ServiceName == 'Lsu')
               <tr @if($data->Lsu > $sr->Total)style="background-color:orange" @endif>
               <td>Lsu</td>
               <td>{{$data->Lsu}}</td>
               <td>{{$data->LsuTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Lsu*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            
            @if(!empty($data->PaxStep) && $sr->ServiceName == 'Pax Step')
               <tr @if($data->PaxStep > $sr->Total)style="background-color:orange" @endif>
               <td>PaxStep</td>
               <td>{{$data->PaxStep}}</td>
               <td>{{$data->PaxStepTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->PaxStep*$sr->BasePay)}}<span></td>
               </tr>
            @endif
           

            @if(!empty($data->BaggageTrailer) && $sr->ServiceName == 'BaggageTrailer')
               <tr @if($data->BaggageTrailer > $sr->Total)style="background-color:orange" @endif>
               <td>BaggageTrailer</td>
               <td>{{$data->BaggageTrailer}}</td>
               <td>{{$data->BaggageTrailerTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->BaggageTrailer*$sr->BasePay)}}</span></td>
               </tr>
            @endif
           

            @if(!empty($data->CateringLift) && $sr->ServiceName == 'CateringLift')
               <tr @if($data->CateringLift > $sr->Total)style="background-color:orange" @endif>
               <td>CateringLift</td>
               <td>{{$data->CateringLift}}</td>
               <td>{{$data->CateringLiftTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->CateringLift*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            

            @if(!empty($data->Stretcher) && $sr->ServiceName == 'Stretcher')
               <tr @if($data->Stretcher > $sr->Total)style="background-color:orange" @endif>
               <td >Stretcher</td>
               <td>{{$data->Stretcher}}</td>
               <td>{{$data->StretcherTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Stretcher*$sr->BasePay)}}</span></td>
               </tr>
            @endif
          

            @if(!empty($data->ManPower) && $sr->ServiceName == 'ManPower')
               <tr @if($data->ManPower > $sr->Total)style="background-color:orange" @endif>
               <td>ManPower</td>
               <td>{{$data->ManPower}}</td>
               <td>{{$data->ManPowerTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->ManPower*$sr->BasePay)}}</span></td>
               </tr>
            @endif
           
            @if(!empty($data->Chocks) && $sr->ServiceName == 'Chocks')
               <tr @if($data->Chocks > $sr->Total)style="background-color:orange" @endif>
               <td>Chocks</td>
               <td>{{$data->Chocks}}</td>
               <td>{{$data->ChocksTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Chocks*$sr->BasePay)}}<span></td>
               </tr>
            @endif
            @if(!empty($data->Headset) && $sr->ServiceName == 'headset')
               <tr @if($data->Headset > $sr->Total)style="background-color:orange" @endif>
               <td>Headset</td>
               <td>{{$data->Headset}}</td>
               <td>{{$data->HeadsetTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Headset*$sr->BasePay)}}</span></td>
               </tr>
            @endif
            

            @if(!empty($data->Deicer) && $sr->ServiceName == 'Deicer')
               <tr @if($data->Deicer > $sr->Total)style="background-color:orange" @endif>
               <td>Deicer</td>
               <td>{{$data->Deicer}}</td>
               <td>{{$data->DeicerTime}} Min</td>
               <td>{{$sr->Total}}</td>
               <td>{{number_format($sr->BasePay)}}</td>
               <td>{{number_format($sr->SumTotal)}}</td>
               <td><span>{{number_format($data->Deicer*$sr->BasePay)}}</sapn></td>
               </tr>
            @endif
           

            @if(!empty($data->Deicefluid) && $sr->ServiceName == 'Deicefluid')
            <tr @if($data->Deicefluid > $sr->Total)style="background-color:orange" @endif>
            <td>Deicefluid</td>
            <td>{{$data->Deicefluid}}</td>
            <td>{{$data->DeicefluidTime}} Min</td>
            <td>{{$sr->Total}}</td>
            <td>{{number_format($sr->BasePay)}}</td>
            <td>{{number_format($sr->SumTotal)}}</td>
            <td><span>{{number_format($data->Deicefluid*$sr->BasePay)}}</span></td>
            </tr>
            @endif

            </tbody>
            
             @endforeach
            <tfoot>
               <tr>
               <td colspan="6" style="text-align:right"><b>Total :</b></td>
               <td >
               
               <?php 
               
               $SumTotal = ($data->CrewCare*$sr->BasePay)
            +($data->PaxCoach*$sr->BasePay)
            +($data->LOM*$sr->BasePay)
            +($data->bmc*$sr->BasePay)
            +($data->vipcar*$sr->BasePay)
            +($data->wch*$sr->BasePay)
            +($data->Gpu*$sr->BasePay)
            +($data->Acu*$sr->BasePay)
            +($data->CrewCare*$sr->BasePay)
            +($data->cpl*$sr->BasePay)
            +($data->Liftruck*$sr->BasePay)
            +($data->TowTractor*$sr->BasePay)
            +($data->towbar*$sr->BasePay)
            +($data->Belt*$sr->BasePay)
            +($data->Lsu*$sr->BasePay)
            +($data->PaxStep*$sr->BasePay)
            +($data->BaggageTrailer*$sr->BasePay)
            +($data->CateringLift*$sr->BasePay)
            +($data->Stretcher*$sr->BasePay)
            +($data->ManPower*$sr->BasePay)
            +($data->Chocks*$sr->BasePay)
            +($data->Headset*$sr->BasePay)
            +($data->Deicer*$sr->BasePay)
            +($data->Deicefluid*$sr->BasePay);
               echo (number_format($SumTotal));
               ?>

               </td>
               </tr>
            </tfoot>
               @endforeach
           
            </table>
          
            </br>
            <div class="divTableRow">
            <div class="divTableCell" >

            <div class="groupbox-shadow" style="padding:5px 5px 5px 5px">
               <table >
                  <thead>
                     <th>DelayCode</th>
                     <th>DelayTime</th>
                  </thead>
                  <tbody>
                     @foreach ($delayinfo as $dllist )
                        <tr> 
                           <td>{{$dllist->delaycode}} </td>
                           <td>{{$dllist->DelayTime}} <b> Min</b></td>    
                        </tr>
                     @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <td><b>Delay Sum :</b></td>
                        <td>( {{$delayTime}} )<b>Min</b></td>
                     </tr>
                  </tfoot>
               </table>
            </div>
            {{-------------------------------------}}
      </div>
             {{-------------------------------------}}

   <div class="divTableCell" >
   <div class="groupbox-shadow" style="padding:5px 5px 5px 5px">
   
                   <table >
                  <thead>
                     <th>Subject</th>
                     <th>FlightTime</th>
                  </thead>
                  <tbody>
                  <tr>
                     <td>FightTime</td>
                     <td>{{$tfc}}</td>                  
                  </tr>
                  <tr>
                     <td>ContractTime</td>
                     <td>{{$ContractTime}}</td>                  
                  </tr>
                  <tr>
                     <td>CalcDelayTime</td>
                     <td><?php $DelayCalcPrice = $tfc - $ContractTime; echo ($DelayCalcPrice);  ?></td>                  
                  </tr>
                  </tbody>
                  </table>
     </div>
   </div>

   {{-------------------------------------}}
               </div>

               
            <br>

            <div class="groupbox-shadow" style="width:98%">
            <b>SumTotal :</b> 
            <span>( {{number_format($SumTotal)}} ) *</span>
            <b>Basic Rate :</b>  
            <span>( {{$bid->Percent}}% )</span>
            =
            <span >{{number_format($SumTotal*$bid->Percent/100)}}</span>

            <span>
            <?php 
            $DelayPriceCalc = App\DelayTime::where ('from','>=','1')->first();
            echo ('DeleyPrice :'.$DelayPriceCalc->precent).'%';
            ?> 
            </span>
            
            </div>


            <script>
    
       /* $(document).ready(function() {
            $('table thead th').each(function(i) {
                calculateColumn(i);
            });
        });

        function calculateColumn(index) {
            var total = 0;
            $('table tr ').each(function() {
                var value = parseInt($('td span', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('table tfoot td span').eq(index).text( total);
             $('p b').eq(index).text('Total :' + total);
             $('h b').eq(index).text('SumTotal :' + total*100/100);
           

            
            
        }*/
        
            </script>

@endsection