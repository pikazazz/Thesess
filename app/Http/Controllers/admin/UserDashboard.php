<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Mail\sendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $student = DB::table('users')->where('role', '=', 'student')->get();
        $teacher = DB::table('users')->where('role', '=', 'teacher')->get();

        return view('components.admin.user-dashboard.home', ['teacher' => $teacher, 'student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (isset($request->teacher_search)) {
            $student = DB::table('users')->where('role', '=', 'student')->get();
            $teacher = DB::table('users')->where('role', '=', 'teacher')->where('lname', 'LIKE', '%' . $request->teacher_search . '%')
                ->orwhere('fname', 'LIKE', '%' . $request->teacher_search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->teacher_search . '%')
                ->orWhere('level', 'LIKE', '%' . $request->teacher_search . '%')->get();
            return view('components.admin.user-dashboard.home', ['teacher' => $teacher, 'student' => $student]);
        } else if (isset($request->student_search)) {
            $student = DB::table('users')
                ->where('role', '=', 'student')
                ->where('fname', 'LIKE', '%' . $request->student_search . '%')
                ->orWhere('lname', 'LIKE', '%' . $request->student_search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->student_search . '%')->get();
            $teacher = DB::table('users')->where('role', '=', 'teacher')->get();
            return view('components.admin.user-dashboard.home', ['teacher' => $teacher, 'student' => $student]);
        } else {
            $student = DB::table('users')->where('role', '=', 'student')->get();
            $teacher = DB::table('users')->where('role', '=', 'teacher')->get();
            return view('components.admin.user-dashboard.home', ['teacher' => $teacher, 'student' => $student]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = substr($request->username,2,2);


        DB::table('users')->insert([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'tel' => '',
            'role' => $request->role,
            'group' => null,
            'year'=>$year,
            'email' => $request->username . '@mail.rmutt.ac.th',
            'password' => Hash::make($request->password),
        ]);



        $student = DB::table('users')->where('role', '=', 'student')->get();
        $teacher = DB::table('users')->where('role', '=', 'teacher')->get();
        return view('components.admin.user-dashboard.home', ['teacher' => $teacher, 'student' => $student]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =  User::find($id);
        $user->password = Hash::make($request->password);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->tel = $request->tel;
        $user->save();


        $mail = new sendEmail($request);
        // return $mail;
        Mail::to($user->email)->send($mail);
        return redirect()->route('UserDashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->delete($id);

        $student = DB::table('users')->where('role', '=', 'student')->get();
        $teacher = DB::table('users')->where('role', '=', 'teacher')->get();

        return view('components.admin.user-dashboard.home', ['teacher' => $teacher, 'student' => $student]);
    }
}
