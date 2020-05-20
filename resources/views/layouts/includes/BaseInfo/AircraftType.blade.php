
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



<div id="Station" class="FormContiner">
    <div id="ContractHeader"> Add Aircraft</div>

    @if (!empty($data))
        <form method="post" action="{{Route('AircraftTypeUpdate')}}">
            @csrf
            <input type="text" name="id" style="display : none" value="{{$data->id}}">
     @else
           <form method="post" action="{{Route('AircraftTypeStore')}}">
            @csrf
    @endif

                    </br>

                    <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 370px;margin-left:15%">

                        <div  class="input-group-prepend">
                            <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Aircraft Type</label>
                        </div>
                        <input id="Type"  style="text-align: center"
                               type="text" class="form-control @error('Type') is-invalid @enderror"  name="Type" placeholder="A310"
                               value="<?php if(!empty($data)){echo $data->Type ;} ?>" required autofocus >
                        @error('Type')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    {{------------------------------------Symbol-----------------------------------------}}

                    <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 370px;margin-left:15%">

                        <div  class="input-group-prepend">
                            <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">SubGroup</label>
                        </div>
                        <input id="SubGroup"  style="text-align: center"
                               type="text" class="form-control @error('SubGroup') is-invalid @enderror"  name="SubGroup" placeholder="300"
                               value="<?php if(!empty($data)){echo $data->SubGroup ;} ?>" >
                        @error('SubGroup')
                        <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
                        @enderror
                    </div>
                    <br>

                    {{------------------------------------btn-----------------------------------------}}

                    <div  style="top: 5px;padding-bottom: 10px;text-align: center">
                        @if(!empty($data))
                            <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-edit"></i>     <i> Update</i> </button>
                        @else
                            <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-save"></i>     <i> Save</i> </button>
                        @endif

                    </div>

                </form>

</div>

@include('layouts.includes.flash-message')
















