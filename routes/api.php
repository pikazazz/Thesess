<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\student\request_group;
use App\Models\publics\messagelogs;
use Illuminate\Support\Facades\DB;
use App\Models\calendar;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::POST('FindGroup', function (Request $request) {
    $request_group = new request_group;
    $request_group->std_sender = $request->sender;
    $request_group->std_receiver =  $request->receiver;
    $request_group->save();
    return $request_group;
});




Route::POST('messageapi', function (Request $request) {

    $result = new messagelogs;
    $result->group = $request->chanel;
    $result->sender = $request->sender_id;
    $result->massage = $request->message;
    $result->save();

    return $request;
});


Route::GET('calendar', function () {

    $result = DB::table('calendar')->get();
    return $result;
});

Route::POST('calendar', function (Request $request) {

    $request->validate(
        [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'backgroundColor' => 'required',
            'borderColor' => 'required',
            'unit' => 'required',
        ],
        [
            'title.required' => 'ตรวจสอบการกรอก หัวข้อ',
            'start_date.required' => 'ตรวจสอบการกรอก วันที่เปิด',
            'end_date.required' => 'ตรวจสอบการกรอก วันที่ปิด ',
            'backgroundColor.required' => 'ตรวจสอบการเลือกสี',
            'borderColor.required' => 'ตรวจสอบการเลือกสี',
            'unit.required' => 'ตรวจสอบการกรอก จำนวนที่เปิดรับ'
        ]
    );

    $result = new calendar;

    $result->title = $request->title;
    $result->start_date = $request->start_date;
    $result->end_date = $request->end_date;
    $result->backgroundColor = $request->backgroundColor;
    $result->borderColor = $request->borderColor;
    $result->allDay = $request->allDay;
    $result->unit = $request->unit;
    $result->year = $request->year;
    $result->type = $request->type;
    $result->save();

    return $result;
});



Route::GET('search', function (Request $request) {
    $result = DB::table('users')
        ->where(function ($query) use ($request) {
            $query->where('role', '=', 'student')
                ->Where('fname', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('role', '=', 'student')
                ->Where('lname', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('role', '=', 'student')
                ->Where('year', 'LIKE', '%' . $request->text . '%');
        })->get();

    return $result;
});


Route::GET('searchgroup', function (Request $request) {
    $result = DB::table('group')->Where('group_name', 'LIKE', '%' . $request->text . '%')->get();
    return $result;
});


Route::GET('searchgroups', function (Request $request) {
    $result = DB::table('group')->Where('group_name', 'LIKE', '%' . $request->title . '%')->get();
    return $result;
});

Route::GET('delexport', function (Request $request) {
    $result = DB::table('export_user')->truncate();
    return $result;
});



