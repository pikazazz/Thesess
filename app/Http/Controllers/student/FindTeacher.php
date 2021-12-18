<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\myaccountmodel;
use App\Models\student\groupModel;
use App\Models\student\request_teacher;
use Illuminate\Support\Facades\Auth;

class FindTeacher extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = myaccountmodel::where('role', '=', 'teacher')->get();

        return view('components.student.findteacher.home', ['teacher' => $teacher]);
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
        if ($request->reject) {
            $cancelRequest = request_teacher::find($id);
            $cancelRequest->status = "reject";
            $cancelRequest->save();
            return view('components.student.request-group.home',['messageSuccess'=>'ปฏิเสธสำเร็จ']);
        } else if ($request->appove) {


            request_teacher::where('request_receiver', '=', Auth::user()->id)->update(['status' => 'cancel']);
            request_teacher::where('request_sender', '=', Auth::user()->id)->update(['status' => 'cancel']);



            $cancelRequest = request_teacher::find($id);
            $cancelRequest->status = "success";
            $cancelRequest->save();

            request_teacher::where('request_sender', '=',  $cancelRequest->request_sender)->update(['status' => 'cancel']);
            request_teacher::where('request_receiver', '=',  $cancelRequest->request_receiver)->update(['status' => 'cancel']);
            request_teacher::where('request_receiver', '=',  $cancelRequest->request_receiver)
                ->where('request_sender', '=',  $cancelRequest->request_sender)
                ->update(['status' => 'success']);

            $group =  groupModel::find($cancelRequest->request_sender);
            $group->teacher = $cancelRequest->request_sender;
            $group->save();



            return view('components.student.request-group.home',['messageSuccess'=>'ยืนยันคำขอสำเร็จ']);
        } else if ($request->cancel) {
            $cancelRequest = request_teacher::find($id);
            $cancelRequest->status = "cancel";
            $cancelRequest->save();
            return view('components.student.request-group.home',['messageSuccess'=>'ยกเลิกคำขอสำเร็จ']);
        } else {
            $teachers =  myaccountmodel::find($id);
            $group =  groupModel::find($request->group);

            $request_teacher = new request_teacher;
            $request_teacher->request_sender = Auth::user()->id;
            $request_teacher->request_receiver = $teachers->id;
            $request_teacher->save();

            $teacher = myaccountmodel::where('role', '=', 'teacher')->get();
            return view('components.student.findteacher.home', ['teacher' => $teacher,'messageSuccess'=>'ส่งคำขอสำเร็จ']);
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
