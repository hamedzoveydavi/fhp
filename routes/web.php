<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('ConfirmUser');

Auth::routes();

Auth::user();

Route::post('AfterRegister', 'ProfileController@index')->name('AfterRegister');

Route::get('/home', 'HomeController@view_Flight_Data')->name('home');

Route::get('/ViewPlan', 'ArrDepContloller@view_plan')->name('ViewPlan');

Route::get('/CreateFlight', function () {
    return view('layouts.includes.ArrDepPrg');
})->name('CreateFlight');

/*-----------------------------START CRUD FLIGHT---------------------------------------------*/
Route::post ('InsertFlight','ArrDepContloller@Push_Data')->name('InsertFlight');

Route::post ('InsertFlightReq','ArrDepContloller@InsertFlight_FN')->name('InsertFlightReq');

Route::post ('view-flight','ArrDepContloller@View_data')->name('view-flight');

Route::post ('delete-flight','ArrDepContloller@Delete_ArrdepInfo')->name('delete-flight');

Route::POST ('Edit-flight','ArrDepContloller@Edit_ArrdepInfo')->name('Edit-flight');
/*-----------------------------END CRUD FLIGHT---------------------------------------------*/
/*-----------------------------START CRUD FLIGHT INFO-----------    ----------------------------------*/
Route::get('/FlightInfo', function () {
    return view('layouts.includes.ArrDepInfo');
})->name('FlightInfo');


Route::get('/EditFlightInfo', function () {
    return view('layouts.includes.EditFlightInfo');
})->name('EditFlightInfo');

Route::get('SelectInfo','ArrDepContloller@SelectInfoFlight')->name('SelectInfo');
Route::post('SelectInf','ArrDepContloller@SelectInfoFlightForSave')->name('SelectInf');


Route::get('ViewFlightInfo','ArrDepContloller@View_data_FlightInfo')->name('ViewFlightInfo');
Route::get('ViewFlightdata','ArrDepContloller@view_FlightData')->name('ViewFlightdata');

Route::post('Flightdatasearch','ArrDepContloller@view_SearchFlightData')->name('Flightdatasearch');

Route::get('ViewFlightInfoAfterUpdate','ArrDepContloller@View_data_FlightInfo_AfterUpdate')->name('ViewFlightInfoAfterUpdate');

Route::post ('SaveFlightInfo','ArrDepContloller@CreateFlightInfo')->name('SaveFlightInfo');

Route::get('Chart','ChartController@ChartTest')->name('Chart');
Route::get('Users','ChartController@ChartTest');
Route::get('users', 'UserChartController@index');
/*-----------------------------END CRUD FLIGHT INFO---------------------------------------------*/
/*-----------------------------Start FLIGHT Status---------------------------------------------*/
Route::get('/EditStatus', function () {
    return view('layouts.includes.StatusFlight');
})->name('EditStatus');

Route::get('ViewFlightStatus','ArrDepContloller@View_data_FlightInfo_EditStatus')->name('ViewFlightStatus');

Route::get('EditStatusToOpen','ArrDepContloller@UpdateStatusToOpen')->name('EditStatusToOpen');
Route::get('EditStatusToClose','ArrDepContloller@UpdateStatusToClose')->name('EditStatusToClose');
Route::get('EditStatusToCancel','ArrDepContloller@UpdateStatusToCancel')->name('EditStatusToCancel');
/*-----------------------------END  FLIGHT Status---------------------------------------------*/
Route::POST('SearchFlightInfo','ArrDepContloller@View_data_SearchFlightInfo')->name('SearchFlightInfo');

/*-----------------------------Start  Report--------------------------------------------------*/
Route::get('/GetDataFlightReport', function () {
    return view('layouts.includes.Report.GetDataFlightReport');
})->name('GetDataFlightReport');

Route::POST('FlightReport','FlightTotalReportController@FlightTotalBetweenDate_Fn_Rpt')->name('FlightReport');

Route::get('/ShareAirortRpt', function () {
    return view('layouts.includes.Report.ShareAirporttotalByStationRpt  ');
})->name('ShareAirortRpt');

Route::post('ShareAirortTotalByStationSearch','ShareAirportSettingController@ShowTotalByStationRpt')->name('ShareAirortTotalByStationSearch');
//ShareAirportTotalRpt

Route::get('ShareAirortTotalRptSearch','ShareAirportSettingController@showTotalRpt')->name('ShareAirortTotalRptSearch');

Route::get('ShareAirortRptSearch','ShareAirportSettingController@showRpt')->name('ShareAirortRptSearch');



/*-----------------------------End  Report--------------------------------------------------*/
/*-----------------------------Start BasicRate--------------------------------------------------*/

Route::get('BasicRateView','BasicRateController@ViewTblBasicRate')->name('BasicRateView');

Route::get('BasicRateViewForUpdate','BasicRateController@show')->name('BasicRateViewForUpdate');

Route::post('BasicRateInsert','BasicRateController@BasicRateInsert')->name('BasicRateInsert');

Route::post('BasicRateUpdate','BasicRateController@Update')->name('BasicRateUpdate');

/*-----------------------------End BasicRate--------------------------------------------------*/
/*-----------------------------Start Equipment--------------------------------------------------*/

Route::post('EquipmentInsert','EquipmentAirportController@EquipmentAirportInsert')->name('EquipmentInsert');
Route::get('FlightClosed','ArrDepContloller@ViewDataWhenClosed')->name('FlightClosed');

Route::get('EquipmentView','EquipmentAirportController@SelectFlightClosed')->name('EquipmentView');

Route::get('ViewEq','EquipmentAirportController@ViewEquipmentForFlight')->name('ViewEq');

Route::get('ViewGhcn','EquipmentAirportController@ViewTblEquipmentAirport')->name('ViewGhcn');

Route::get('ViewDetailEquipment','EquipmentAirportController@viewDetailEquipment')->name('ViewDetailEquipment');


/*-----------------------------End Equipment--------------------------------------------------*/
/*-----------------------------Start Delay--------------------------------------------------*/


Route::get('DelayTimeBase','DelayTimeController@index')->name('DelayTimeBase');
Route::get('DelayTimeBaseShowItem','DelayTimeController@show')->name('DelayTimeBaseShowItem');
Route::post('DelayTimeBaseStor','DelayTimeController@store')->name('DelayTimeBaseStor');
Route::post('DelayTimeBaseUpdate','DelayTimeController@update')->name('DelayTimeBaseUpdate');
Route::post('DelayTimeBaseDelete','DelayTimeController@destroy')->name('DelayTimeBaseDelete');

Route::get('/DelayForm', function () {
    return view('layouts.includes.DelayDesc');
})->name('DelayForm');

Route::get('/DelayFormEdit', function () {
    return view('layouts.includes.DelayCodeUpdate');
})->name('DelayFormEdit');

Route::post('DelayCodeTable','DelayController@InsertDelay')->name('DelayCodeTable');
Route::get('ViewDelayCodeTable','DelayController@ViewTbldelayCode')->name('ViewDelayCodeTable');
Route::get('DelayCodeDelete','DelayController@DeleteDelayCode')->name('DelayCodeDelete');
Route::post('DelayCodeEdit','DelayController@EditDelayCode')->name('DelayCodeEdit');

/*-----------------------------End Delay--------------------------------------------------*/

Route::get('/DelayCodeSave', function () {
    return view('layouts.includes.DelayCodeSaveForFlight');
})->name('DelayCodeSave');

Route::get('/DelayCodeEdit', function () {
    return view('layouts.includes.DelayTimeEdit');
})->name('DelayCodeEdit');

Route::post('FlightDelayCodeSave','DelayFlightController@create')->name('FlightDelayCodeSave');
Route::get('FlightDelayShowInfo','DelayFlightController@show')->name('FlightDelayShowInfo');
Route::post('FlightDelayEditInf','DelayFlightController@update')->name('FlightDelayEditInf');
Route::get('FlightDelayDeleteInf','DelayFlightController@destroy')->name('FlightDelayDeleteInf');

Route::get('ViewDelayFlight','DelayFlightController@show')->name('ViewDelayFlight');
/*-----------------------------Start ProfileController--------------------------------------------------*/

Route::get('Profile','ProfileController@ShowUnit')->name('Profile');


Route::get('/GetImage', function () {
    return view('layouts.includes.Access.GetImage');
})->name('GetImage');

Route::post('viewimage','ProfileController@image');
Route::post('SaveProfile','ProfileController@store')->name('SaveProfile');
Route::post('UpdateProfile','ProfileController@Update')->name('UpdateProfile');

Route::get('ShowProfile','ProfileController@show')->name('ShowProfile');

Route::post('save','ImageController@store');

/*-----------------------------Start ConfirmUser--------------------------------------------------*/


Route::get('ConfirmUser','ConfirmmUserController@index')->name('ConfirmUser');

Route::Post('CreateAcc','ConfirmmUserController@store')->name('CreateAcc');

Route::post('objList','ObjectAccController@index')->name('objList');
Route::post('Addobjacc','AccessoryController@store')->name('Addobjacc');
Route::get('userlist','ProfileController@ShowUserProfile')->name('userlist');
Route::get('disableuser','ConfirmmUserController@edit')->name('disableuser');


Route::get('objacc', function () {
    return view('layouts.includes.Access.AccessObjectList');
})->name('objacc');
/*-----------------------------End ConfirmUser--------------------------------------------------*/
/*-----------------------------Start Contract--------------------------------------------------*/


Route::get('/Contract', function () {
    return view('layouts.includes.Contract.Contract');
})->name('Contract');

Route::post('/ContractCreate','ContractController@store')->name('ContractCreate');

Route::get('/ContractItem', function () {
    return view('layouts.includes.Contract.ContractItem');
})->name('ContractItem');

Route::post('/MinGroundTimeStore','MinGroundTimeController@store')->name('MinGroundTimeStore');

Route::get('/MinGroundTimeForm','MinGroundTimeController@index')->name('MinGroundTimeForm');

Route::get('/ServicesItemPage','ContractServicesController@index')->name('ServicesItemPage');
Route::get('/ServicesItemPageForUpdate','ContractServicesController@show')->name('ServicesItemPageForUpdate');
Route::post('/ServicesStore','ContractServicesController@store')->name('ServicesStore');
Route::post('/ServicesUpdate','ContractServicesController@update')->name('ServicesUpdate');


Route::get('/ContactList','ContractController@index')->name('ContactList');

Route::post('/ContactSearch','ContractController@show')->name('ContactSearch');

Route::get('/ContactMinDataFetch','MinGroundTimeController@fetch_data')->name('ContactMinDataFetch');

Route::post('/ServicesDeleteItem','ContractServicesController@destroy')->name('ServicesDeleteItem');


Route::get('/ctitem','ContractServicesController@fetch_data')->name('ctitem');

Route::get('/ServiceDelete','ContractServicesController@destroy')->name('ServiceDelete');
/*-----------------------------End Contract--------------------------------------------------*/
/*-----------------------------Start Cargo--------------------------------------------------*/

Route::get('/CargoBase','CargoBaseController@index')->name('CargoBase');

Route::get('/CargoBaseShow','CargoBaseController@show')->name('CargoBaseShow');

Route::post('/CargoBaseStore','CargoBaseController@store')->name('CargoBaseStore');
Route::post('/CargoBaseUpdate','CargoBaseController@edit')->name('CargoBaseUpdate');
Route::get('/CargoBaseDelete','CargoBaseController@destroy')->name('CargoBaseDelete');
/*-----------------------------End Cargo--------------------------------------------------*/
/*-----------------------------Start MoneyToAirport--------------------------------------------------*/
Route::get('/ShareAirportLatter', function () {
    return view('layouts.includes.BaseInfo.ShareLatterAirport');
})->name('ShareAirportLatter');

Route::get('/ShareAirportList','ShareLatterAirportController@index')->name('ShareAirportList');
Route::get('/ShareAirportLatterForUpdate','ShareLatterAirportController@show')->name('ShareAirportLatterForUpdate');
Route::get('/ShareAirportSetting','ShareAirportSettingController@index')->name('ShareAirportSetting');
Route::post('/ShareStore','ShareLatterAirportController@store')->name('ShareStore');
Route::post('/ShareUpdate','ShareLatterAirportController@update')->name('ShareUpdate');
Route::post('/ShareSettingStore','ShareAirportSettingController@store')->name('ShareSettingStore');
Route::post('/ShareSettingUpdate','ShareAirportSettingController@update')->name('ShareSettingUpdate');
Route::post('/ShareSettingDelete','ShareAirportSettingController@destroy')->name('ShareSettingDelete');
Route::post('/ShareSettingTypeStore','ShareAirportSettingController@AircraftTypestore')->name('ShareSettingTypeStore');

/*-----------------------------End MoneyToAirport--------------------------------------------------*/
/*-----------------------------Start Station--------------------------------------------------*/
Route::get('/Station', function () {
    return view('layouts.includes.BaseInfo.Station');
})->name('Station');

Route::get('/StationForUpdate','StationController@show')->name('StationForUpdate');

Route::get('/StationList','StationController@index')->name('StationList');

Route::post('/StationStore','StationController@store')->name('StationStore');
Route::post('/StationUpdate','StationController@update')->name('StationUpdate');
/*-----------------------------End Station--------------------------------------------------*/
/*-----------------------------Start AircraftType--------------------------------------------------*/
Route::get('/AircraftType', function () {
    return view('layouts.includes.BaseInfo.AircraftType');
})->name('AircraftType');

Route::get('/AircraftTypeList','AircraftTypeController@index')->name('AircraftTypeList');

Route::get('/AircraftTypeForUpdate','AircraftTypeController@show')->name('AircraftTypeForUpdate');

Route::post('/AircraftTypeStore','AircraftTypeController@store')->name('AircraftTypeStore');

Route::post('/AircraftTypeUpdate','AircraftTypeController@Update')->name('AircraftTypeUpdate');
/*-----------------------------End AircraftType--------------------------------------------------*/









