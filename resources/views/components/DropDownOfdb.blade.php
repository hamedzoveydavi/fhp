
<select name="{{$element}}" style="width: 100px">

<?php
use App\BasicRate;
/*** query the database ***/
$result = BasicRate::select('{{$field}}')->get();
  ?>
/*** loop over the results ***/
@foreach($result as $row)

/*** create the options ***/
<option >
    {{ $row }}
</option>

@endforeach


</select>
