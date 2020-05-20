@extends('layouts.app')
@section('content')
    <style>

        .btn {
            background-color: DodgerBlue; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 12px 16px; /* Some padding */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
        }

    </style>


    <div class="FormContiner" >
        <div id="ContractHeader"> Delay Time Parametr</div>

       @if(!empty($datareq))
            <form method="post" action="{{Route('DelayTimeBaseUpdate')}}">
                @csrf
                <input type="text" value="{{$datareq->id}}" name="id" style="display: none">
         @else
             <form method="post" action="{{Route('DelayTimeBaseStor')}}">
                @csrf
        @endif


       
        <div class="divTableRow">
            <div class="divTableCell" >


            <div  class="input-group" style="width:450px ; margin: 5px 10px 10px 10px">
                    <div  class="input-group-prepend">
                    <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >From</label>
                              </div>
                               <input id="from" style="text-align: center" type="text" class="form-control @error('from') is-invalid @enderror"  name="from"
                               value="<?php if(!empty($datareq)){ echo $datareq->from ; } ?>"   REQUIRED>
                                <div  class="input-group-prepend">
                                    <label style="border-radius:0 15px 15px 0;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Min</label>
                                </div>
                            @error('from')
                          <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
             </div>

               
             

        </div>

         <div class="divTableCell" >
             <div  class="input-group" style="width:400px ; margin: 5px 10px 10px 10px">
                    <div  class="input-group-prepend">
                         <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >TO</label>
                             </div>
                                <input id="to" style="text-align: center" type="text" class="form-control @error('to') is-invalid @enderror"  name="to"
                                   value="<?php if(!empty($datareq)){ echo $datareq->to ; } ?>"   REQUIRED>
                                     <div  class="input-group-prepend">
                                         <label style="border-radius:0 15px 15px 0;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Min</label>
                                     </div>
                                 @error('to')
                         <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
              @enderror
         </div>
       </div>

     </div>


        <div class="divTableRow">
            <div class="divTableCell" >

        <div  class="input-group" style="width:450px ; margin: 5px 10px 10px 10px">
            <div  class="input-group-prepend">
                <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >Precent</label>
                    </div>
                         <input id="precent" onkeyup="separateNum(this.value,this);" style="text-align: center" type="text" class="form-control @error('precent') is-invalid @enderror"  name="precent"
                             value="<?php if(!empty($datareq)){ echo $datareq->precent ; } ?>"   REQUIRED>
                      @error('precent')
                     <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
            </div>
        </div>


    <div  style="top: 5px;padding-bottom: 10px;text-align: center">
        @if(!empty($datareq))
            <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-edit"></i>     <i> Update</i> </button>
        @else
        <button id="btn" class="btn" style="width: 330px;height: 40px;"><i class="fa fa-save" ></i>     <i> Save</i> </button>
       @endif
    </div>






    
</form>
    </div>

<br>
    <table style="width: 70%;margin-left: 130px">
        <thead>
            <th style="width: 5%">No</th>
            <th style="width: 20%">Min</th>
            <th style="width: 20%">Max</th>
            <th>Precent</th>
            <th>Edit</th>
        </thead>
        <tbody>
    @if(!empty($data))
    @foreach($data as $list)
        <tr>
            <td>{{$list->id}}</td>
            <td>{{$list->from}}</td>
            <td>{{$list->to}}</td>
            <td>{{$list->precent}} %</td>
            <td>
                <a href="{{Route('DelayTimeBaseShowItem',['id'=>$list->id])}}"><img src="images/edit.png"></a>
                <a id="delete"  href="{{Route('DelayTimeBaseDelete',['id'=>$list->id])}}"> <img src="images/delete.png"></a>
            </td>

        </tr>
        @endforeach
        @endif
    </tbody>
</table>



<script>
    function separateNum(value, input) {
        /* seprate number input 3 number */
        var nStr = value + '';
        nStr = nStr.replace(/\,/g, "");
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        if (input !== undefined) {

            input.value = x1 + x2;
        } else {
            return x1 + x2;
        }
    }
</script>

@endsection
