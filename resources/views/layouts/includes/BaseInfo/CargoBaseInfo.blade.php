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
        <div id="ContractHeader"> Cargo Pay</div>

        @if(!empty($datareq))
            <form method="post" action="{{Route('CargoBaseUpdate')}}">
                @csrf
                <input type="text" value="{{$datareq->id}}" name="id" style="display: none">
         @else
             <form method="post" action="{{Route('CargoBaseStore')}}">
                @csrf
         @endif


        <div class="divTableRow">
            <div class="divTableCell" >

                <div  class="input-group" style="width:450px ; margin: 5px 10px 10px 10px">
                    <div  class="input-group-prepend">
                         <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >OF</label>
                              </div>
                               <input id="minkg" style="text-align: center" type="text" class="form-control @error('Type') is-invalid @enderror"  name="minkg"
                               value="<?php if(!empty($datareq)){ echo $datareq->minkg ; } ?>"   REQUIRED>
                                <div  class="input-group-prepend">
                                    <label style="border-radius:0 15px 15px 0;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Kg</label>
                                </div>
                            @error('Type')
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
                                <input id="maxkg" style="text-align: center" type="text" class="form-control @error('maxkg') is-invalid @enderror"  name="maxkg"
                                   value="<?php if(!empty($datareq)){ echo $datareq->maxkg ; } ?>"   REQUIRED>
                                     <div  class="input-group-prepend">
                                         <label style="border-radius:0 15px 15px 0;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Kg</label>
                                     </div>
                                 @error('Type')
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
                <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >Price</label>
                    </div>
                         <input id="price" onkeyup="separateNum(this.value,this);" style="text-align: center" type="text" class="form-control @error('Type') is-invalid @enderror"  name="price"
                             value="<?php if(!empty($datareq)){ echo $datareq->price ; } ?>"   REQUIRED>
                      @error('Type')
                     <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
            </div>


        <div class="divTableCell">
            <div  class="input-group" style="padding: 10px 10px 10px 10px">
                <select name="Currency_Unit" value="" style="width: 400px;height: 35px; left: 50px;">
                   @if (!empty($datareq))
                        <option >{{$datareq->Currency_Unit}} </option >
                    @else
                    <option hidden value="" disabled selected>Select a Currency unit</option>
                    @endif
                    /*** create the options ***/
                    <option > ریال </option>
                    <option >تومان </option>
                    <option >USD $</option>
                    <option >ERU €</option>
                </select>
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
            <th>Price</th>
            <th>Edit</th>
        </thead>
        <tbody>
    @if(!empty($data))
    @foreach($data as $cargo)
        <tr>
            <td>{{$cargo->id}}</td>
            <td>{{$cargo->minkg}}</td>
            <td>{{$cargo->maxkg}}</td>
            <td>{{number_format($cargo->price)}} {{$cargo->Currency_Unit}}</td>
            <td>
                <a href="{{Route('CargoBaseShow',['id'=>$cargo->id])}}"><img src="images/edit.png"></a>
                <a id="delete"  href="{{Route('CargoBaseDelete',['id'=>$cargo->id])}}"> <img src="images/delete.png"></a>
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
