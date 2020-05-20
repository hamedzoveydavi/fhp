
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


    <div id="ServicesBox" class="FormContiner">
        <div id="ContractHeader"> Services List</div>

        @if (!empty($data))
            <form method="post" action="{{Route('ServicesStore')}}">
            @csrf
        @else
            <form method="post" action="{{Route('ServicesUpdate')}}">
            @csrf
        @endif


            <div class="divTableRow">
            <div class="divTableCell" >
                <div  class="input-group" style="padding: 10px 10px 10px 10px">


                    {{------------------------------------ServiceSymbol-----------------------------------------}}

                    <input type="text" name="id" value="<?php if(!empty($dservice)){ echo $dservice->id ; } ?>"  style="display: none" >

                    <input type="text" name="ContractNum_" value="<?php if(!empty($data)){ echo $data->ContractNum ; } ?>"  style="display: none" >
                    <input type="text" name="Minid" value="<?php if(!empty( $_GET['Minid'])){echo  $_GET['Minid'] ;} ?>"   style="display: none">


                    <select name="ServiceSymbol" style="width:250px;height: 35px;">
                        <?php
                        use App\Services;
                        /*** query the database ***/
                        $result = Services::select('ServiceSymbol')->get();
                        ?>
                            @if(!empty($dservice))
                                <option > {{$dservice->ServiceName}} </option>
                            @else
                                <option hidden value="" disabled selected>Select a Service</option>
                            @endif

                           /*** loop over the results ***/
                        @foreach($result as $row)
                            /*** create the options ***/
                            <option >
                                {{ $row->ServiceSymbol }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
            {{------------------------------------Device unit-----------------------------------------}}
            <div class="divTableCell">
                <div  class="input-group" style="padding: 10px 10px 10px 10px">
                    <select name="Device_Unit" style="width: 250px;height: 35px;">
                        @if(!empty($dservice))
                            <option > {{$dservice->DeviceUnit}} </option>
                        @else
                            <option hidden value="" disabled selected>Select a unit</option>
                        @endif
                        /*** create the options ***/
                        <option >Device</option>
                        <option >Time</option>
                    </select>
                </div>
            </div>

        </div>
            {{------------------------------------fi-----------------------------------------}}
            <div class="divTableRow">
                <div class="divTableCell" >
                  <div  class="input-group" style="top: 5px;padding-bottom: 10px;width: 260px">

                    <div  class="input-group-prepend">
                        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">Base Pay</label>
                    </div>
                    <input id="BasePay"  onkeyup="separateNum(this.value,this);" style="text-align: center"
                           type="text" class="form-control @error('BasePay') is-invalid @enderror"  name="BasePay" placeholder="1,000,000"
                    value="<?php if(!empty($dservice)){echo $dservice->BasePay ;} ?>" >
                    @error('BasePay')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>
            </div>


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
            {{------------------------------------Currency unit-----------------------------------------}}
            <div class="divTableCell">
                <div  class="input-group" style="padding: 10px 10px 10px 10px">
                    <select name="Currencyـunit"  style="width: 250px;height: 35px; left: 50px;">
                       @if(!empty($dservice))
                            <option > {{$dservice->CurrencyUnit}} </option>
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
           {{------------------------------------Total-----------------------------------------}}
            <div class="divTableRow">
            <div class="divTableCell" >
                <div  class="input-group" style="padding: 10px 10px 10px 0px">

                    <div  class="input-group-prepend">
                        <label style="border-radius:15px 0 0 15px;height: 37px;border: 1px solid #DCDCDC" class="input-group-text">Total</label>
                    </div>
                    <input id="Total" style="text-align: center"
                           type="text" class="form-control @error('Total') is-invalid @enderror"  name="Total"
                           value="<?php if(!empty($dservice)){echo $dservice->Total ;} ?>" >
                    @error('Total')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                         </span>
                    @enderror
                </div>
              </div>
            </div>
           {{------------------------------------btn-----------------------------------------}}

                <div  style="top: 5px;padding-bottom: 10px;text-align: center">
                    @if(!empty($dservice))
                        <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-edit"></i>     <i> Update</i> </button>
                    @else
                    <button id="btn" class="btn" style="width: 330px;height: 40px"><i class="fa fa-save"></i>     <i> Save</i> </button>
                        @endif
                </div>
{{--{{csrf_field()}}--}}
        </form>

    </div>

<div id="messages"></div>

@include('layouts.includes.flash-message')



<script>




   /* $(document).ready(function() {
        function RefreshTable() {
            $( "#tblservices" ).load( "ContractItem.php #tblservices" );
        }

        $("#btn").on("click", RefreshTable);

        // OR CAN THIS WAY
        //
        // $("#refresh-btn").on("click", function() {
        //    $( "#mytable" ).load( "your-current-page.html #mytable" );
        // });


    });*/


  /*  $(document).ready(function(){
        fetch_data();

        function fetch_data() {
            $.ajax({
                url:"{{--{{Route('ContactItemFetch')}}--}}",
                dataType:"json",
                success:function (data) {
                    var html='';
                    html += '<tr>;'
                    html += '<td contenteditable id="id"></td>';
                    html += '<td contenteditable id="Service"></td>';
                    html += '<td contenteditable id="Unit"></td>';
                    html += '<td contenteditable id="BasePay"></td>';
                    html += '<td contenteditable id="Currency"></td>';
                    html += '<td contenteditable id="Total"></td>';
                    html += '<td contenteditable id="SumTotal"></td>';
                    html += '<td></td></tr>';
                    for(var count=0;count <data.length ;count++){
                        html+='<tr>';
                        html+='<td contenteditable="true" class="column_name" data-column_name="id"' +
                            'id="'+data[count].id+'">'+[count].id+'</td>';
                        html+='<td contenteditable="true" class="column_name" data-column_name="Service"' +
                            'id="'+data[count].id+'">'+[count].Service+'</td>';
                        html+='<td contenteditable="true" class="column_name" data-column_name="Unit"' +
                            'id="'+data[count].id+'">'+[count].Unit+'</td>';
                        html+='<td contenteditable="true" class="column_name" data-column_name="BasePay"' +
                            'id="'+data[count].id+'">'+[count].BasePay+'</td>';
                        html+='<td contenteditable="true" class="column_name" data-column_name="Currency"' +
                            'id="'+data[count].id+'">'+[count].Currency+'</td>';
                        html+='<td contenteditable="true" class="column_name" data-column_name="Total"' +
                            'id="'+data[count].id+'">'+[count].Total+'</td>';
                        html+='<td contenteditable="true" class="column_name" data-column_name="SumTotal"' +
                            'id="'+data[count].id+'">'+[count].SumTotal+'</td>';
                        html+='<td> <button type="button" class="btn btn-danger btn-xs editable" id="'+data[count].id+'"' +
                            'id="">Edit</button></td></tr>';
                    }
                    $('tbody').html(html);
                }
            });
        }
        var _token = $('input[name="_token"]').val();

        $(document).on('click','#add',function () {
            var Service = $('#service').text();
            var Unit = $('#Unit').text();
            var BasePay = $('#BasePay').text();
            var Currency = $('#Currency').text();
            var Total = $('#Total').text();
            var SumTotal = $('#SumTotal').text();
            if((!empty(Service)) || (!empty(Unit)) || (!empty(BasePay)) || (!empty(Currency)) || (!empty(Total)) ){
                $.ajax({
                    url:"{{--{{Route('ServicesStore')}}--}}",
                    method:"POST",
                    data:{service:service,Unit:Unit,BasePay:BasePay,Currency:Currency,Total:Total,SumTotal:SumTotal,_token:_token},
                    success:function (data) {
                        $('#message').html(data);
                        fetch_data();
                    }

                });
            }else{
                $('#message').html("<div class='alert alert-danger'>Both Filed Are Required</div>")
            }

        })
    })*/

</script>















