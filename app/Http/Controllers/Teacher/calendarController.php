<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\calendar;
use App\Models\teacher\examgroup;
use Illuminate\Support\Facades\Auth;

class calendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duedate =  calendar::get();
        $listbooking =  calendar::where('year', '=', Auth::user()->year)->get();

        return view('components.public.register.home', ['duedate' => $duedate, 'listbooking' => $listbooking]);
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
        $RegisterExam = json_decode($request->data);
        //check count unit regis

        $checkCount = examgroup::where('exam_id', '=', $RegisterExam->id)->get()->count();
        if ($checkCount < $RegisterExam->unit) {
            $checkdupicate = examgroup::where('group', '=', Auth::user()->group)->where('exam_id', '=', $RegisterExam->id)->first();

            if ($checkdupicate) {
                return redirect()->route('RegisterExam.index')->with('message', 'ไม่สามารถลงทะเบียนได้เนื่องจากได้ลงทะเบียนแล้ว')->with('messagetype', 'error');
            } else {
                return redirect()->route('RegisterExam.index')->with('message', 'ลงทะเบียนสอบสำเร็จ')->with('messagetype', 'success');
            }
        } else {
            return redirect()->route('RegisterExam.index')->with('message', 'ไม่สามารถลงทะเบียนได้ เนื่องจากเต็มจำนวนเเล้ว')->with('messagetype', 'warning');
        }
        //register
        //result


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        calendar::destroy($request->id);
        $message = "ลบรายการสำเร็จ";
        $messageType = "success";
        return redirect()->route('RegisterExam.index')->with('message', $message)->with('messageType', $messageType);
    }
}
