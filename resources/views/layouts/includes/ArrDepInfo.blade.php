@extends('layouts.app')


@section('content')

      <style>
        .cel{
            border: white 0;
            background-color: white
        }

        fieldset {
            margin: 8px;
            border: 1px solid silver;
            padding: 8px;
            border-radius: 4px;
        }

        legend {
            padding: 2px;
        }
    </style>
      <div>khgihguygf</div>

     <form method="post" action="{{Route('SaveFlightInfo')}}">
         @csrf


         <input type="text" name="id" value="{{$info->id}}" style="display: none;">

         <div style="border: 1px #DCDCDC solid;border-radius: 5px;padding: 3px 0px 3px 3px;">
             <div class="divTable">
                 <div class="divTableBody">
                     <div class="divTableRow">
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                                    'name'=>'Date'
                                    ,'subject'=>'Date.Dep'
                                    ,'value'=>$info->Date_ETD
                                     ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                                  'name'=>'Airline'
                                  ,'subject'=>'Airline'
                                  ,'value'=>$info->Airline
                                  ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                                     'name'=>'Des'
                                     ,'subject'=>'Destination'
                                     ,'value'=>$info->To
                                      ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                                     'name'=>'ETA'
                                     ,'subject'=>'E.Time.A'
                                     ,'value'=>$info->ETA
                                      ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                                      'name'=>'ETD'
                                      ,'subject'=>'E.Time.D'
                                      ,'value'=>$info->ETD
                                       ])
                             @endcomponent
                         </div>
                     </div>

                        <div class="divTableRow">
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                              'name'=>'Arr_No'
                              ,'subject'=>'Arrival.No'
                              ,'value'=>$info->Arr_No
                                    ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                               'name'=>'Dep_No'
                               ,'subject'=>'Departure.No'
                               ,'value'=>$info->Dep_No
                                    ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                               'name'=>'Reg'
                               ,'subject'=>'Reg'
                               ,'value'=>$info->Reg
                                    ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">
                             @component('components.InputForFetch',[
                               'name'=>'Type'
                               ,'subject'=>'Type'
                               ,'value'=>$info->Type
                                     ])
                             @endcomponent
                         </div>
                         <div class="divTableCell" style="width: 20%">

                         </div>

                     </div>
                 </div>
             </div>
         </div><br>
         @include('layouts.includes.flash-message')

    <div style="border: 1px #1E90FF solid;border-radius: 5px">
        <div style="height: 40px;background-color: #1E90FF ;text-align: center;font:2em bold"> ARRIVAL</div>
        <div>

            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.textCoor',[
                             'name'=>'ATA',
                             'is_insert'=>true,
                             'is_Calendar'=>false
                              ])
                            @endcomponent

                             </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.textCoor',[
                              'name'=>'ChocksOn',
                              'is_insert'=>true,
                              'is_Calendar'=>false

                               ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 34%">

                        </div>
                        </div>

                    <div class="divTableRow">
                        <div class="divTableCell" style="width: 33.5%">

                            @component('components.textCoor',[
                                           'name'=>'TPA_ARR',
                                           'is_insert'=>true,
                                           'is_Calendar'=>false

                                            ])
                            @endcomponent
                         </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.textCoor',[
                                                         'name'=>'TBA_ARR',
                                                         'is_insert'=>true,
                                                         'is_Calendar'=>false

                                                          ])
                            @endcomponent
                        </div>
                        <div class="divTableCell" style="width: 33.5%">
                            @component('components.textCoor',[
                                                       'name'=>'WCH_ARR',
                                                       'is_insert'=>true,
                                                       'is_Calendar'=>false

                                                        ])
                            @endcomponent
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div><br>

      <div style="border: 1px #7FFFD4 solid;border-radius: 5px">
          <div  style="height: 40px;background-color: #7FFFD4 ;text-align: center;font:2em bold"> DEPARTURE</div>
          <div>
              <div class="divTable">
                  <div class="divTableBody">
                      <div class="divTableRow">
                          <div class="divTableCell" style="width: 33.5%">
                              @component('components.textCoor',[
                                 'name'=>'ChocksOf',
                                 'is_insert'=>true,
                                 'is_Calendar'=>false
                                   ])
                              @endcomponent
                          </div>
                          <div class="divTableCell" style="width: 33.5%">
                              @component('components.textCoor',[
                                   'name'=>'ATD',
                                   'is_insert'=>true,
                                   'is_Calendar'=>false
                                    ])
                              @endcomponent
                          </div>
                          <div class="divTableCell" style="width: 34%">

                          </div>
                      </div>
                      <div class="divTableRow">
                          <div class="divTableCell" style="width: 33.5%;">
                              @component('components.textCoor',[
                             'name'=>'ADL_Dep',
                             'is_insert'=>true,
                             'is_Calendar'=>false

                              ])
                              @endcomponent
                          </div>
                          <div class="divTableCell" style="width: 33.5%;">
                              @component('components.textCoor',[
                                'name'=>'CHD_Dep',
                                'is_insert'=>true,
                                'is_Calendar'=>false

                                 ])
                              @endcomponent
                          </div>
                          <div class="divTableCell" style="width: 33.5%;">
                              @component('components.textCoor',[
                                'name'=>'INF_Dep',
                                'is_insert'=>true,
                                'is_Calendar'=>false

                                 ])
                              @endcomponent
                          </div>
                      </div>
                      <div class="divTableRow">
                          <div class="divTableCell" style="width: 33.5%;">
                              @component('components.textCoor',[
                                  'name'=>'TPD_Dep',
                                  'is_insert'=>true,
                                  'is_Calendar'=>false

                                   ])
                              @endcomponent
                          </div>
                          <div class="divTableCell" style="width: 33.5%;">
                              @component('components.textCoor',[
                                'name'=>'TBD_Dep',
                                'is_insert'=>true,
                                'is_Calendar'=>false

                                 ])
                              @endcomponent
                          </div>
                          <div class="divTableCell" style="width: 33.5%;">
                              @component('components.textCoor',[
                                'name'=>'VCIP_Dep',
                                'is_insert'=>true,
                                'is_Calendar'=>false
                                 ])
                              @endcomponent
                          </div>
                      </div>
                      <div class="divTableRow">
                          <div class="divTableCell" style="width: 33.5%;">
                              @component('components.textCoor',[
                                 'name'=>'WCH_Dep',
                                 'is_insert'=>true,
                                 'is_Calendar'=>false

                                  ])
                              @endcomponent
                          </div>
                      </div>
                  </div>
              </div>
         </div>
          </div><br>

      <div style="border: 1px #D3D3D3 solid;border-radius: 5px">
          <div style="height: 40px;background-color: #D3D3D3 ;text-align: center;font:2em bold"> GATE / HALL</div>
          <div>
          <div class="divTable">
              <div class="divTableBody">
                  <div class="divTableRow">
                      <div class="divTableCell" style="width: 33.5%">
                          @component('components.textCoor',[
                    'name'=>'Hall',
                    'is_insert'=>true,
                    'is_Calendar'=>false

                     ])
                          @endcomponent
                          </div>
                      <div class="divTableCell" style="width: 33.5%">
                          @component('components.textCoor',[
                              'name'=>'Gate',
                              'is_insert'=>true,
                              'is_Calendar'=>false

                               ])
                          @endcomponent</div>
                      <div class="divTableCell" style="width: 33.5%"></div>
                  </div>
              </div>
          </div>
          </div>
      </div>
         <br>
          <div >
              <b><button type="button" style="width: 250px;border-radius: 5px" class="btn btn-outline-primary" href="#" onclick=" myPopup ('{{Route('DelayCodeSave',['id'=>$_REQUEST['id']])}}', 'web', 550,250);">Delay Form</button></b>
          </div>
         <br>
      <textarea rows="6" cols="100" name="Remark" placeholder="Remark" ></textarea>
<div style="text-align: center">
      <button style="width: 250px;height: 50px;border-radius: 5px" type="submit" class="btn btn-success">Save Info</button>
</div>
     </form>
      <script>
          function myPopup(myURL, title, myWidth, myHeight) {
              var left = (screen.width - myWidth) / 2;
              var top = (screen.height - myHeight) / 6;
              var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
          }
      </script>
@endsection
