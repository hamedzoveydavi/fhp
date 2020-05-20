@extends('layouts.app')

@section('content')


    <form method="post" action="{{Route('FlightReport')}}" target="_blank">
        @csrf

<ul>
        <li class="nav-item nav-search d-none d-md-flex" id="navbarSearch" style="padding-top: 15px">

            <div class="dropdown">
                <button style="height: 36px" class="btn btn-secondary" type="button" >
                    Start Date
                </button>
            </div>
            <input type="date" style="width: 25%" class="input input__icon  form-control  @error('Search') is-invalid @enderror" name="StartDate" id="Search" >
        </li>

        </ul>
    <ul>
        <li class="nav-item nav-search d-none d-md-flex" id="navbarSearch" style="padding-top: 15px">
            <div class="dropdown">
                <button style="height: 36px" class="btn btn-secondary" type="button" >
                    End Date
                </button>
            </div>
            <input type="date" style="width: 25%" class="input input__icon  form-control  @error('Search') is-invalid @enderror" name="EndDate" id="Search" >

        </li>
    </ul>
            <button type="submit" style="margin-left: 130px" class="nav-link d-flex justify-content-center align-items-center">Search <i class="mdi mdi-magnify mx-0"></i></button>

    </form>






@endsection
