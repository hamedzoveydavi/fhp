<link rel="stylesheet" href="{{asset ('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

    .HeadItem{
        width: 97%;
        height: 25px;
        border: 1px solid black;
        border-radius:5px;
        background-color:silver;
    }

    .Sidbardata{
        width: 250px;
        height: 400px;
        margin-top: 10px;
        padding:5px 5px 5px 5px;

    }
    .BasicRate{
        width: auto;
        padding: 5px 5px 5px 5px;
        overflow-y:auto;
    }
    .container{
        width: 90%;
        height: auto;
        text-align: center;
        padding: 5px 5px 5px 300px;
        border-radius: 3px;
        
        
    }
    html, body {
        overflow: visible;
    }

</style>

<?php 
 use App\AircraftType;  
  $tbl = AircraftType::all();
?>


@include('layouts.includes.flash-message')


<div class="container" >
    {{--------------------------------start row---------------------------------------------------}}
    <div class="divTableRow">
        {{--------------------------------start cell---------------------------------------------------}}
        <div class="divTableCell" style="width:500px" >
            {{-----------------------------------------------------------------------------------}}
            @if(!empty($Sthead))

                @foreach($Sthead as $stlist)


            <div class="groupbox-shadow BasicRate" >                      
                <div id="ContractHeader" >   Station : {{$stlist->Station}}
                </div>

              <table>
                      <tbody>

                        @foreach($tdata as $list)
                      
                      @if($list->Station == $stlist->Station)
      <tr>
                                 
                              
            <td style="direction: rtl" >
                <div >
                                                                
                        <div class="divTableRow">
                            <div class="divTableCell">
                                <input name="Type" type="text" style="text-align:center" value="{{$list->Type}}@if(!empty($list->SubGroup))-{{$list->SubGroup}} @endif" disabled > <br>
                            </div>
                            <div class="divTableCell" >
                            <form method="post" action="{{Route('ShareSettingUpdate',['id'=>$list->id])}}">
                                @csrf

                                <input type="text" name="Price" onkeyup="separateNum(this.value,this);" style="border: 1px solid black;text-align: center" 
                                value="{{number_format($list->Price)}}"
                                    placeholder="400,000">

                                  </div>
                            

                            <div class="divTableCell" >
                                <button class="btn-success"><i class="fa fa-save"></i></button>
                                </form>
                            </div>
                            <div class="divTableCell" >
                            <form method="post" action="{{Route('ShareSettingDelete',['id'=>$list->id])}}">
                            @csrf
                                <button class="btn-danger"><i class="fa fa-times-circle"></i></button>
                                </form>
                            </div>

                        </div>
                    </div>
            </td>
        
    </tr>
                                 @endif
                        @endforeach
                       </tbody>
                  </table>
            </div>
            <br>
               @endforeach
               


           @endif
            {{-----------------------------------------------------------------------------------}}
            <button  type="submit" class="btn btn-success"  style="width: 40%;" data-toggle="modal" data-target="#myModal" > <i class="fa fa-plus"></i> <i>Type</i></button>
        </div>
        
        {{--------------------------------end cell---------------------------------------------------}}
         <form method="post" action="{{Route('ShareSettingStore')}}" >
            @csrf
            {{--------------------------------start cell---------------------------------------------------}}
             <div class="divTableCell" >
             {{-----------------------------------------------------------------------------------}}
                 <div class="groupbox-shadow Sidbardata" >
                    <div class="groupbox-shadow" style="text-align: left;height: 22%">
                             <input name="id" type="text" value="{{$data->id}}" style="display:none">
                            <div name="LetteNum" class="HeadItem" style="margin-bottom: 10px ">Latter Number :  {{$data->LatterNum}}</div>
                            <div class="HeadItem" >Issue Date :{{$data->Date}}</div>
                    </div>
                    <br>
            {{-----------------------------------------------------------------------------------}}
                    <div class="groupbox-shadow" style="padding: 0">
                        <div id="ContractHeader" style="margin-bottom: 10px;border-radius: 3px"> Station</div>
                             @foreach($station as $list)
                                <div style="margin-right: 15px">
                                    <input type="checkbox" name="check_list[]" value="{{$list->Station}}">   {{$list->Station}} <br>
                                </div>
                             @endforeach
                         <br>
                            <div style="margin-bottom: 7px;text-align: center">
                                <button type="submit" class="btn btn-success" style="width: 97%;"> <i class="fa fa-mail-reply-all"></i> <i>Send</i></button>
                            </div>
                    </div>
                    
                    <br>
           {{-----------------------------------------------------------------------------------}}
                </div>
             </form>
            {{--------------------------------end cell---------------------------------------------------}}
             </div>
            

    </div>
    {{--------------------------------end row---------------------------------------------------}}
</div>


{{-------------------------------------------Form Model----------------------------------------}}

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

   

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Please Select A Station And AircraftType  </h4>
        </div>
        
        <div class="modal-body">
        <form method="POST" action="{{Route('ShareSettingTypeStore')}}">
         @csrf
         
         <select name="Station" style="width: 97%;height: 35px;">
                      <option hidden value="" disabled selected>Select a Station</option>
                        {{--@if(!empty($TblStation))--}}
                            {{--@foreach($TblStation as $listSt)--}}
                            <option > {{$data->Station}}  </option>
                            {{--@endforeach--}}
                        {{--@endif--}}
                    </select>
        <br>
        <br>
            
                    <select name="Type" style="width: 97%;height: 35px;">
                      <option hidden value="" disabled selected>Select a Type</option>
                        @if(!empty($tbl))
                            @foreach($tbl as $list)
                            <option > {{$list->Type}} @if(!empty($list->SubGroup))-{{$list->SubGroup}} @endif </option>
                            @endforeach
                        @endif
                    </select>
         
        <br>
        <br>
                   <div style="text-align:center"> <button type="submit" class="btn btn-success" style="width: 50%;"> <i class="fa fa-save"></i> <i>Save</i></button></div>
        <br>
        </form>
                   @include('layouts.includes.flash-message')
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
{{-----------------------------------------------------------------------------------}}





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


