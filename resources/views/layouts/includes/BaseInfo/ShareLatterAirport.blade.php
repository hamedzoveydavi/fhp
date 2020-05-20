
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


    <div id="ShareLatter" class="FormContiner">
        <div id="ContractHeader"> Saved Latter Information</div>

        @if (!empty($data))
            <form method="post" action="{{Route('ShareUpdate')}}">
            @csrf
            
            <input type="text" name="id" value="{{$data->id}}" style="display:none">
        @else
            <form method="post" action="{{Route('ShareStore')}}">
            @csrf
        @endif


<br>
        <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 300px;margin-left: 20%">

            <div  class="input-group-prepend">
                <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Latters Number</label>
            </div>
            <input id="LatterNum"  style="text-align: center"
                type="text" class="form-control @error('LatterNum') is-invalid @enderror"  name="LatterNum"
            value="<?php if(!empty($data)){echo $data->LatterNum ;} ?>"  required autofocus>
            @error('LatterNum')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            {{------------------------------------Date-----------------------------------------}}

                  <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 300px;margin-left: 20%">

                    <div  class="input-group-prepend">
                        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Date</label>
                    </div>
                    <input id="Date"  style="text-align: center"
                           type="text" class="form-control @error('Date') is-invalid @enderror"  name="Date" placeholder="1399/01/01"
                    value="<?php if(!empty($data)){echo $data->Date ;} ?>"  required autofocus>
                    @error('Date')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>

                {{------------------------------------Date-----------------------------------------}}

                <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 400px;margin-left: 20%">

                    <div  class="input-group-prepend">
                        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Station</label>
                    </div>
                    <?php use App\Station;
                    $tbl = Station::all();
                    ?>
                    <select name="Station" style="width: 231px;height: 35px;">
                    @if(!empty($data))
                        <option>{{$data->Station}}</option>
                    @else
                        <option hidden value="" disabled selected>Select a Station</option>
                    @endif
                        @if(!empty($tbl))
                            @foreach($tbl as $list)
                            <option > {{$list->Symbol}} </option>
                            @endforeach
                        @endif
                    </select>
                    @error('Station')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>
<br>
                {{------------------------------------btn-----------------------------------------}}

                <div  style="top: 5px;padding-bottom: 10px;text-align: center">
                    {{--@if(!empty($dservice))--}}
                       {{--<button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-edit"></i>     <i> Update</i> </button>--}}
                       {{--@else--}}
                    <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-save"></i>     <i> Save</i> </button>
                    {{--@endif--}}

                </div>

        </form>

    </div>

@include('layouts.includes.flash-message')
















