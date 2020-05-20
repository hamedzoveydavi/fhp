<link rel="stylesheet" href="{{asset ('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<form method="post" action="{{Route('MinGroundTimeStore')}}" >
    @csrf
    <div class="FormContiner" >
        <div id="ContractHeader"> Minimum Ground Time</div>
        <input name="ContractNum" value="{{$_GET['ContractNum']}}"  style="display: none">
        <br>

            {{------------------------------------Type-----------------------------------------}}

        <div  class="input-group" style="width:450px ; margin: 5px 10px 10px 10px">
                    <div  class="input-group-prepend">

                        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px" >Type</label>
                    </div>
                    <input id="Type" style="text-align: center" type="text" class="form-control @error('Type') is-invalid @enderror"  name="Type"
                           value="<?php if(!empty($Mingt)){ echo $Mingt->Type ; } ?>"   REQUIRED>
                    @error('Type')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                    @enderror
        </div>


            {{------------------------------------GroundTime-----------------------------------------}}

        <div  class="input-group" style="width: 450px; margin: 5px 10px 10px 10px">
                    <div  class="input-group-prepend">
                        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Min Ground Time</label>
                    </div>
                    <input id="MinGroundTime" style="text-align: center;width: 150px" type="text" class="form-control @error('MinGroundTime') is-invalid @enderror"  name="MinGroundTime"
                           value="<?php if(!empty($Mingt)){ echo $Mingt->MinGroundTime ; } ?>" >
                    <div  class="input-group-prepend">
                        <label style="border-radius:0 15px 15px 0;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Min</label>
                    </div>
                    @error('MinGroundTime')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                    @enderror
        </div>



        <div  class="input-group" style="top: 5px;padding-bottom: 10px;left: 25%">
            <button id="GT" class="btn" style="width: 230px;height: 40px"><i class="fa fa-save"></i>     <i> Save</i> </button>
        </div>

    </div>
</form>
<br>
@include('layouts.includes.flash-message')

