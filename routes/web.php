<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\student\matchGroup;
use App\Http\Controllers\student\myaccount;
use App\Http\Controllers\student\editaccount;
use App\Http\Controllers\student\thesis;
use App\Http\Controllers\student\introduce;
use App\Http\Controllers\student\FindTeacher;
// use App\Http\Controllers\student\fileupload;
use App\Http\Controllers\student\thesistopic;
use App\Http\Controllers\student\requestGroup;


use App\Http\Controllers\Teacher\TeacherView;
use App\Http\Controllers\Teacher\TeacherAccount;
use App\Http\Controllers\Teacher\proposal;
use App\Http\Controllers\Teacher\joingroup;
use App\Http\Controllers\Teacher\group;
use App\Http\Controllers\Teacher\mygroup;


use App\Http\Controllers\publics\groups;
use App\Http\Controllers\publics\error;
use App\Http\Controllers\fileManage;

use App\Http\Controllers\admin\introduceManage;
use App\Http\Controllers\admin\UserDashboard;
use App\Http\Controllers\admin\account;
use Illuminate\Support\Facades\Auth;

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








Route::group(['middleware' => ['checkrole:student']], function () {
    Route::resource('FindGroup', matchGroup::class);
    Route::resource('myaccount', myaccount::class);
    Route::resource('editaccount', editaccount::class);
    Route::resource('thesis', thesis::class);
    Route::resource('introduce', introduce::class);
    Route::resource('FindTeacher', FindTeacher::class);
    Route::resource('FileUpload', fileManage::class);
    Route::resource('thesistopic', thesistopic::class);
    Route::resource('RequestGroup', requestGroup::class);
    Route::POST('/table', function (Request $request) {
        $year = Auth::user()->year;

        $student = DB::table('users')->where('id', '!=', Auth::user()->id)
            ->where(function ($query)  use ($request, $year) {
                $query->where('role', '=', 'student')
                    ->where('fname', 'LIKE', '%' . $request->key . '%')
                    ->where('year', '=',  $year);
            })->Orwhere(function ($query)  use ($request, $year) {
                $query->where('role', '=', 'student')
                    ->where('lname', 'LIKE', '%' . $request->key . '%')
                    ->where('year', '=',  $year);
            })->orderBy('email', 'asc')
            ->get();

        return view('components.student.group.table', ['student' => $student]);;
    });
});

Route::resource('Group', groups::class);
Route::resource('Error', error::class);

Route::group(['middleware' => ['checkrole:teacher']], function () {
    Route::resource('Dashboard', TeacherView::class);
    Route::resource('Account', TeacherAccount::class);
    Route::resource('Proposal', proposal::class);
    Route::resource('JoinGroup', joingroup::class);
    Route::resource('MyGroup', mygroup::class);
});

Route::group(['middleware' => ['checkrole:admin']], function () {
    Route::resource('UserDashboard', UserDashboard::class);
    Route::resource('Account', account::class);
    Route::resource('Introduce', introduceManage::class);

    Route::GET('RTF', function (Request $request) {
        try {
            if ($request->message == 5) {
                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', 'http://203.158.101.9/RTF/?path=' . $request->file_name);
                $data = json_decode($response->getBody());

                $passwordexport = [];
                for ($i = 0; $i < sizeof($data); $i++) {
                    $pass = null;
                    $pass = Str::random(10);
                    $passwordexport[$i] = [
                        'email' => Str::replaceArray('-', [''], $data[$i]->std_id) . '@gmail.com', 'password' => $pass
                    ];
                    DB::table('users')->insert([
                        'fname' => $data[$i]->fname,
                        'lname' => $data[$i]->lname,
                        'username' => Str::random(10),
                        'tel' => '',
                        'role' => 'student',
                        'group' => null,
                        'email' => Str::replaceArray('-', [''], $data[$i]->std_id) . '@mail.rmutt.ac.th',
                        'year' => substr($data[$i]->std_id, 2, 2),
                        'password' => Hash::make(Str::random(10)),
                    ]);
                    $pass = null;
                }
            } else {
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $student = DB::table('users')->where('role', '=', 'student')->get();
            $teacher = DB::table('users')->where('role', '=', 'teacher')->get();
            return view('components.admin.user-dashboard.home', ['teacher' => $teacher, 'student' => $student, 'message' => $request->message, 'messages' => $ex->getMessage()]);
        }
    });
});


Route::get('/', function () {
    return view('home');
});

Auth::routes(['register' => false]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
