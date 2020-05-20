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
    .green-point{
        width: 15px;
        height: 15px;
        border-radius: 15px;
        background-color: #00c689;

            }

.red-point{
    width: 15px;
    height: 15px;
    border-radius: 15px;
    background-color:red;

}
</style>

<a style="border-radius: 5px;" class="btn btn-success" onclick=" myPopup ('{{Route('ShareAirportLatter')}}', 'web', 600,390);" >
    Add Share Airport Latter  <img style="width: 25px;margin-left: 10px" src="images/add-icon.png">
</a>
</br></br>

<table>
    <thead>
        <th>#</th>
        <th>No</th>
        <th>Station</th>
        <th>latter Num</th>
        <th>Date</th>

        <th>Edid</th>
        <th>Titel</th>
    </thead>

    <tbody>
    @foreach($data as $list)
         <tr style="background-color: @if($list->Status == 0) silver @endif">
            <td style="text-align: center;padding-top: 7px">@if($list->Status == 0) <label class="red-point"></label> @else <label class="green-point"></label> @endif</td>
            <td>{{$list->id}}</td>
            <td>{{$list->Station}}</td>
            <td>{{$list->LatterNum}}</td>
            <td>{{$list->Date}}</td>
            <td>
            <button type="button" id="btn" @if($list->Status == 0) class="btn btn-primary disabled" @else class="btn-warning" @endif style="width: 100px;height: 35px"
            onclick=" myPopup ('{{Route('ShareAirportLatterForUpdate',['id'=>$list->id])}}', 'web', 600,390);"
            @if($list->Status == 0)  disabled @endif >
                <i class="fa fa-edit"></i>
                <i> Edit</i>
                </button></td>
            <td>
                 <a id="btn" class="btn btn-info" style="width: 100px;height: 35px" href="{{Route('ShareAirportSetting',['id'=>$list->id])}}" target="_blank"
                {{-- onclick=" myPopup ('{{Route('ShareAirportSetting',['id'=>$list->id])}}', 'web', 1800,1000);"--}}
                    >
                <i class="fa fa-folder"></i>
                <i> Titel</i>
 </a></td>

        </tr>
        @endforeach
    </tbody>
</table>

<script>

    function myPopup(myURL, title, myWidth, myHeight) {
        var left = (screen.width - myWidth) / 2;
        var top = (screen.height - myHeight) / 6;
        var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
    }

</script>


@endsection
