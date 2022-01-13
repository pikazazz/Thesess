<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\student\myaccountmodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherAccount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('components.teacher.account.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('components.teacher.account.edit',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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


        if ($request->repassword) {
            $user = User::findOrFail($id);

            if (Hash::check($request->oldpassword, $user->password)) {
                $user->fill([
                    'password' => Hash::make($request->newpassword)
                ])->save();

                $request->session()->flash('success', 'Password changed');
                return redirect()->route('Accounts.index')->with('messages','เปลี่ยนรหัสผ่านสำเร็จ')->with('messagetype','success');
            } else {
               // $request->session()->flash('error', 'Password does not match');
                return redirect()->route('Accounts.show', Auth::user()->id)->with('messages','รหัสผ่านเก่าไม่ถูกต้อง')->with('messagetype','error');
            }
        } else {
            $myaccount = myaccountmodel::find($id);
            $myaccount->fname = $request->fname;
            $myaccount->lname = $request->lname;
            $myaccount->address = $request->address;
            $myaccount->tel = $request->tel;
            $myaccount->email = $request->email;
            $myaccount->save();
            return redirect()->route('Accounts.index')->with('messages','แก้่ไขข้อมูลสำเร็จ')->with('messagetype','success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
