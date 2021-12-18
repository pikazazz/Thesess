<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\myaccountmodel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class myaccount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.student.myaccount.home');
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
        return view('components.student.myaccount.edit', ['id' => $id]);
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
                return redirect()->route('myaccount.index',['messages'=>'1']);
            } else {
               // $request->session()->flash('error', 'Password does not match');
                return redirect()->route('myaccount.show', [Auth::user()->id,'messages'=>'2']);
            }
        } else {
            $myaccount = myaccountmodel::find($id);
            $myaccount->fname = $request->fname;
            $myaccount->lname = $request->lname;
            $myaccount->address = $request->address;
            $myaccount->tel = $request->tel;
            $myaccount->email = $request->email;
            $myaccount->save();
            return redirect('../myaccount');
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
