<?php

use App\Mail\sendEmail;
use App\Models\admins\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\student\request_group;
use App\Models\publics\messagelogs;
use Illuminate\Support\Facades\DB;
use App\Models\calendar;
use App\Models\category_calendar;
use App\Models\student\groupModel;
use App\Models\teacher\examgroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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


Route::GET('searchteacher', function (Request $request) {
    $result = DB::table('users')
        ->where(function ($query) use ($request) {
            $query->where('role', '=', 'teacher')
                ->Where('fname', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('role', '=', 'teacher')
                ->Where('lname', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('role', '=', 'teacher')
                ->Where('year', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('role', '=', 'teacher')
                ->Where('tel', 'LIKE', '%' . $request->text . '%');
        })->get();

    return $result;
});



Route::GET('search', function (Request $request) {
    $result = groupModel::join('users', 'group.id', '=', 'users.group')
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
        })->orWhere(function ($query) use ($request) {
            $query->where('role', '=', 'student')
                ->Where('tel', 'LIKE', '%' . $request->text . '%');
        })->get();


    return $result;
});



Route::GET('searchgroup', function (Request $request) {

    function checkstatus($status)
    {
        if ($status == 'warning') {
            return '<span class="badge bg-warning">กำลังอยู่ในระหว่างดำเนินการ</span>';
        } elseif ($status == 'success') {
            return '<span class="badge bg-success">ผ่าน</span>';
        } else {
            return '<span class="badge bg-danger">ไม่ผ่าน</span>';
        }
    }

    function checkper($id, $year)
    {
        $counts =   category_calendar::where('year', '=', $year)->get()->count();
        $count = examgroup::where('group', '=', $id)
            ->where('status', '=', 'ผ่าน')
            ->get()
            ->count();
        if (($count /  $counts) * 100 > 79) {
            return '<span class="badge bg-success">' . ($count / $counts) * 100 . '%</span>';
        } else {
            return '<span class="badge bg-danger">' . ($count / $counts) * 100 . '%</span>';
        }
    }

    $year = intval(date("Y")) + 539;
    $result = groupModel::join('users', 'group.id', '=', 'users.group')
        ->select('group.group_name', 'group.status', 'group.id', 'users.tel', 'users.year', 'users.fname', 'users.lname')
        ->Where('group_name', 'LIKE', '%' . $request->text . '%')
        ->get();
    foreach ($result as $Result) {
        $Result->per = checkstatus($Result->status);
        $Result->checkstatus =  checkper($Result->id, $Result->year);
    }
    return $result;
});

Route::GET('searchend', function (Request $request) {
    function checkstatusend($status)
    {
        if ($status == 'warning') {
            return '<span class="badge bg-warning">กำลังอยู่ในระหว่างดำเนินการ</span>';
        } elseif ($status == 'success') {
            return '<span class="badge bg-success">ผ่าน</span>';
        } else {
            return '<span class="badge bg-danger">ไม่ผ่าน</span>';
        }
    }



    function checkperend($id, $year)
    {
        $counts =   category_calendar::where('year', '=', $year)->get()->count();
        $count = examgroup::where('group', '=', $id)
            ->where('status', '=', 'ผ่าน')
            ->get()
            ->count();
        if (($count /  $counts) * 100 > 79) {
            return '<span class="badge bg-success">' . ($count / $counts) * 100 . '%</span>';
        } else {
            return '<span class="badge bg-danger">' . ($count / $counts) * 100 . '%</span>';
        }
    }


    $result = groupModel::join('users', 'group.id', '=', 'users.group')
    ->select('group.group_name', 'group.status', 'group.id', 'users.tel', 'users.year', 'users.fname', 'users.lname')
        ->where(function ($query) use ($request) {
            $query->where('status', '=', 'success')
                ->Where('group_name', 'LIKE', '%' . $request->text . '%');
        })->distinct()->get(['group_name']);

    foreach ($result as $Result) {
        $Result->per = checkstatusend($Result->status);
        $Result->checkstatus =  checkperend($Result->id, $Result->year);
    }

    return $result;
});


Route::GET('searchwait', function (Request $request) {

    function checkstatuswait($status)
    {
        if ($status == 'warning') {
            return '<span class="badge bg-warning">กำลังอยู่ในระหว่างดำเนินการ</span>';
        } elseif ($status == 'success') {
            return '<span class="badge bg-success">ผ่าน</span>';
        } else {
            return '<span class="badge bg-danger">ไม่ผ่าน</span>';
        }
    }

    function checkperwait($id, $year)
    {
        $counts =   category_calendar::where('year', '=', $year)->get()->count();
        $count = examgroup::where('group', '=', $id)
            ->where('status', '=', 'ผ่าน')
            ->get()
            ->count();


        if (($count / $counts) * 100 > 79) {

            return '<span class="badge bg-success">' . ($count / $counts) * 100 . '%</span>';
        } else {
            return '<span class="badge bg-danger">' . ($count / $counts) * 100 . '%</span>';
        }
    }


    $result = groupModel::join('users', 'group.id', '=', 'users.group')
    ->select('group.group_name', 'group.status', 'group.id', 'users.tel', 'users.year', 'users.fname', 'users.lname')
        ->where(function ($query) use ($request) {
            $query->where('status', '=', 'warning')
                ->Where('group_name', 'LIKE', '%' . $request->text . '%');
        })->distinct()->get(['group_name']);




    foreach ($result as $Result) {
        $Result->per = checkstatuswait($Result->status);
        $Result->checkstatus =  checkperwait($Result->id, $Result->year);
    }

    return $result;
});





Route::GET('searchgroups', function (Request $request) {
    $result =  groupModel::join('users', 'group.id', '=', 'users.group')
        ->select('group.*', 'users.year')
        ->Where('group_name', 'LIKE', '%' . $request->title . '%')->distinct()->get();
    return $result;
});

Route::GET('delexport', function (Request $request) {
    $result = DB::table('export_user')->truncate();
    return $result;
});


Route::GET('searchkey', function (Request $request) {

    function checkstatusS($status)
    {
        if ($status == 'warning') {
            return '<span class="badge bg-warning">กำลังอยู่ในระหว่างดำเนินการ</span>';
        } elseif ($status == 'success') {
            return '<span class="badge bg-success">ผ่าน</span>';
        } else {
            return '<span class="badge bg-danger">ไม่ผ่าน</span>';
        }
    }

    function checkperS($id, $year)
    {
        $counts =   category_calendar::where('year', '=', $year)->get()->count();
        $count = examgroup::where('group', '=', $id)
            ->where('status', '=', 'ผ่าน')
            ->get()
            ->count();
        if (($count / 5) * 100 > 79) {
            return '<span class="badge bg-success">' . ($count / $counts) * 100 . '%</span>';
        } else {
            return '<span class="badge bg-danger">' . ($count / $counts) * 100 . '%</span>';
        }
    }


    if ($request->group = 'group') {
        $year = intval(date("Y")) + 539;
        $result = groupModel::join('users', 'group.id', '=', 'users.group')
            ->select('group.group_name', 'group.status', 'group.id', 'users.tel', 'users.year', 'users.fname', 'users.lname')
            ->Where('group_name', 'LIKE', '%' . $request->text . '%')->where('teacher', '=', $request->id)
            ->where('year', '=', substr($year, 2, 2))
            ->get();
        foreach ($result as $Result) {
            $Result->per = checkstatusS($Result->status);
            $Result->checkstatus = checkperS($Result->id, $Result->year);
        }
        return $result;
    } else if ($request->group = 'success') {
        $groupEnd = groupModel::join('users', 'group.id', '=', 'users.group')
            ->select('group.group_name', 'group.status', 'group.id', 'users.tel', 'users.year', 'users.fname', 'users.lname')

            ->where('status', '=', 'success')->Where('group_name', 'LIKE', '%' . $request->text . '%')->where('teacher', '=', Auth::user()->id)
            ->get();
        foreach ($groupEnd as $Result) {
            $Result->per = checkstatusS($Result->status);
            $Result->checkstatus =  checkperS($Result->id, $Result->year);
        }
        return $groupEnd;
    } else if ($request->group = 'warning') {
        $groupWait = groupModel::join('users', 'group.id', '=', 'users.group')
            ->select('group.group_name', 'group.status', 'group.id', 'users.tel', 'users.year', 'users.fname', 'users.lname')
            ->where('status', '=', 'warning')->Where('group_name', 'LIKE', '%' . $request->text . '%')->where('teacher', '=', Auth::user()->id)
            ->get();
        foreach ($groupWait as $Result) {
            $Result->per = checkstatusS($Result->status);
            $Result->checkstatus =  checkperS($Result->id, $Result->year);
        }
        return $groupWait;
    }
});


Route::GET('searchkey2', function (Request $request) {


    $result = groupModel::join('users', 'group.id', '=', 'users.group')
        ->where(function ($query) use ($request) {
            $query->where('teacher', '=', $request->id)
                ->Where('fname', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('teacher', '=', $request->id)
                ->Where('lname', 'LIKE', '%' . $request->text . '%');
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('teacher', '=', $request->id)
                ->Where('year', 'LIKE', '%' . $request->text . '%');
        })->orWhere(function ($query) use ($request) {
            $query->where('teacher', '=', $request->id)
                ->Where('tel', 'LIKE', '%' . $request->text . '%');
        })->get();

    return  $result;
});


Route::GET('calendarname', function (Request $request) {
    $result =  category_calendar::where('year', '=', $request->year)->get();
    return $result;
});


Route::GET('detailProject', function (Request $request) {

    $group = groupModel::join('users', 'group.id', '=', 'users.group')->where('year', '=', $request->year)->get();


    return  $group;
});


Route::GET('regiscalendar', function (Request $request) {

    $data = category_calendar::join('calendar', 'calendar.title', '=', 'category_calendar.name')
        ->join('exam_group', 'exam_group.exam_id', '=', 'calendar.id')
        ->join('group', 'group.id', '=', 'exam_group.group')
        ->select('exam_group.status as Last_status', 'exam_group.exam_id as Exam_id')
        ->where('category_calendar.year', '=', $request->year)
        ->where('exam_group.group', '=', $request->group)->get();

    return   $data;
});
