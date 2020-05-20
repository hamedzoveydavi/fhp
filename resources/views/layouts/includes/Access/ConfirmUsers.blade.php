@extends('layouts.app')


@section('content')

<style>

    table{
        width: 100%;
        font-family: Tahoma;
        font-size: small;
        text-align: center;
    }
    table,td,th{
        border: 1px solid black;
    }
    th{
        height: 30px;
        background-color: silver;
    }

</style>
@include('layouts.includes.flash-message')

    <table  class=" table-hover">
        <thead >

                <th scope="row">Username</th>
                <th scope="col">Pcode</th>
                <th scope="col">NameFamily</th>
                <th scope="col">Station</th>
                <th scope="col">Unit</th>
                <th scope="col">Position</th>
                <th scope="col">Accessory</th>
                <th scope="col">Confirm</th>

        </thead>

  @if (!empty($newusers))
            
            @foreach($newusers as $us)
            <tbody>
                    <tr>
                             <td> {{$us->Name}} {{$us->Family}}</td>
                             <td>{{$us->Percode}}</td>
                            <td>{{$us->Username}}</td>
                            <td>{{$us->Station}}</td>
                            <td>{{$us->Unit}}</td>
                            <td>{{$us->Position}}</td>

                             <form method="POST" action="{{Route('CreateAcc')}}">
                                    @csrf
                                        <td><select name="acc"  >
                                                <option selected="selected" name="acc" value="SysAdmin">SysAdmin</option>
                                                <option selected="selected" name="acc" value="Coordinator">Coordinator</option>
                                                <option selected="selected" name="acc" value="ViewRpt_Dusbor">ViewRpt_Dusbord</option>
                                                <option selected="selected" name="acc" value="ViewPR">ViewPR</option>
                                                <option selected="selected" name="acc" value="Workorder">Workorder</option>
                                            </select></td>
                                        <td>

                                             <input style="display: none" name="pid" value="{{$us->id}}">
                                            <input style="display: none" name="uid" value="{{$us->userid}}">

                                        <button type="submit" class="btn btn-success">Confirm</button>
                                        </td>
                             </form>
                      </tr>
            </tbody>
            @endforeach
        </table>
             
     @else
               <tbody>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
       </tbody>
               @endif
</table>


@endsection






