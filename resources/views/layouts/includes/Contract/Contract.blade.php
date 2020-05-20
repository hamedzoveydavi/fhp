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

    <div style="border: 1px #1E90FF solid;border-radius: 5px">
        <div style="height: 40px;background-color: #d5d8dc ;border: 1px #1E90FF solid ;text-align: left;font:2em bold;padding-bottom: 5px"> Contract</div>
        <form method="post" action="{{Route('ContractCreate')}}">
            @csrf
<div style="width: 450px;margin-left: 25%;">


    <div  class="input-group" style="top: 5px;padding-bottom: 10px">
        <div  class="input-group-prepend">
            <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Contract number</label>
        </div>
        <input id="Contract_No" style="text-align: center" type="text" class="form-control @error('Contract_No') is-invalid @enderror"  name="Contract_No">
        @error('Contract_No')
        <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
        @enderror
    </div>

</div>

        <div class="divTableRow">
            <div class="divTableCell" style="width: 24%">

                <div  class="input-group" style="top: 5px;padding-bottom: 10px">
                    <div  class="input-group-prepend">
                        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">AirLine</label>
                    </div>
                    <input id="AirLine" style="text-align: center" type="text" class="form-control @error('AirLine') is-invalid @enderror"  name="AirLine">
                    @error('AirLine')
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
                    @enderror
                </div>

            </div>
            <div class="divTableCell" style="width: 25%">

                <div  class="input-group" style="top: 5px;padding-bottom: 10px">
                    <div  class="input-group-prepend">
                        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Symbol</label>
                    </div>
                    <input id="Symbol" style="text-align: center" type="text" class="form-control @error('Symbol') is-invalid @enderror"  name="Symbol">
                    @error('Symbol')
                    <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
                    @enderror
                </div>

            </div>
        </div>
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 24%">
                            @component('components.DateEn',[
                                                      'name'=>'Start_Date',
                                                      'subject'=>'start Date'
                                                     , 'is_require'=>'true'

                                                       ])
                            @endcomponent

                        </div>
                        <div class="divTableCell" style="width: 25%">
                            @component('components.DateEn',[
                           'name'=>'End_Date',
                           'subject'=>'End Date'
                          , 'is_require'=>'true'

                            ])
                            @endcomponent
                        </div>
                    </div>
            <div style="text-align: center ;margin-bottom: 10px">
                <button class="btn" style="width: 230px;height: 50px"><i class="fa fa-save"></i>     <i>Save</i> </button>
            </div>
        </form>
        </div>


    </div>



@endsection
