
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
        <div id="ContractHeader"> Stations</div>

        @if (!empty($data))
            <form method="post" action="{{Route('StationUpdate')}}">
            @csrf
            <input type="text" name="id" style="display : none" value="{{$data->id}}">
        @else
            <form method="post" action="{{Route('StationStore')}}">
            @csrf
       @endif

</br>

        <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 370px;margin-left:15%">

            <div  class="input-group-prepend">
                <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Station Name</label>
            </div>
            <input id="StationName"  style="text-align: center"
                type="text" class="form-control @error('StationName') is-invalid @enderror"  name="StationName" placeholder="مهرآباد"
            value="<?php if(!empty($data)){echo $data->StationName ;} ?>" required autofocus >
            @error('StationName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
         {{------------------------------------Symbol-----------------------------------------}}

        <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 370px;margin-left:15%">

          <div  class="input-group-prepend">
              <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Symbol</label>
          </div>
          <input id="Symbol"  style="text-align: center"
                 type="text" class="form-control @error('Symbol') is-invalid @enderror"  name="Symbol" placeholder="THR"
          value="<?php if(!empty($data)){echo $data->Symbol ;} ?>" required autofocus>
          @error('Symbol')
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
















