
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>

@endif

@if(Session::has('success-Share'))
    <script type="text/javascript">
        swal({
            title:'Success!',
            text:"{{Session::get('success')}}",
            timer:5000,
            type:'success'
        }).then((value) => {
            //location.reload();
        }).catch(swal.noop);
    </script>
    
    
@endif




@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

</div>

@endif

@if ($message = Session::get('delay'))

    <div  class="alert" style="text-align: center ; direction: rtl;background-color: #FF6F61;">
        <button  type="button" class="close" data-dismiss="alert">×</button>
        <strong >{{ $message }}</strong>
    </div>

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('info'))

<div class="alert alert-info alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif

@if ($message = Session::get('Duplicate'))

    <div style="text-align: center" class="alert alert-warning alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

@endif


@if ($errors->any())

<div class="alert alert-danger">

	<button type="button" class="close" data-dismiss="alert">×</button>

	Please check the form below for errors

</div>

@endif



@if ($message = Session::get('MsgDeAct'))

    <div style="text-align: center" class="alert alert-warning alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>

@endif


<script>
function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
    }
</script>
