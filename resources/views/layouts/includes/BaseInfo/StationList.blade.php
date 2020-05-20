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


<a style="border-radius: 5px;" class="btn btn-success" onclick=" myPopup ('{{Route('Station')}}', 'web', 600,390);" >
               Add Station  <img style="width: 25px;margin-left: 10px" src="images/add-icon.png">
           </a>
</br></br>

<table style="width: 60%">
    <thead>
        <th style="width: 10%">id</th>
        <th style="width: 20%">Station</th>
        <th style="width: 15%">Symbol</th>
        <th style="width: 15%">Titel</th>

    </thead>

    <tbody>
    @foreach($data as $list)
        <tr>

            <td>{{$list->id}}</td>
            <td>{{$list->StationName}}</td>
            <td>{{$list->Symbol}}</td>
            <td>

            <a  class="btn" style="width: 180px;height: 40px"
                             onclick=" myPopup ('{{Route('StationForUpdate',['id'=>$list->id])}}', 'web', 600,390);">
                        <i class="fa fa-edit"></i>   <i> Edit</i></a>
            </td>

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
