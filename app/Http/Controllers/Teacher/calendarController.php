<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\calendar;
use App\Models\student\groupModel;
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
        $year = intval(date("Y")) + 539;
        $group = groupModel::join('users', 'group.id', '=', 'users.group')->where('year', '=', substr($year, 2, 2))
            ->get();
        $listbookingMe =  calendar::join('exam_group', 'exam_group.exam_id', '=', 'calendar.id')
            ->select('calendar.title', 'exam_group.created_at', 'exam_group.status', 'calendar.type', 'exam_group.summation')
            ->where('group', '=', Auth::user()->group)->get();

        // dd($listbookingMe);

        return view('components.public.register.home', ['duedate' => $duedate, 'listbooking' => $listbooking, 'group' =>  $group, 'listbookingMe' => $listbookingMe]);
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
        $checkCount = examgroup::where('exam_id', '=', $RegisterExam->id)->get()->count();



        function create($RegisterExam)
        {
            $create =  new examgroup();
            $create->group = Auth::user()->group;
            $create->exam_id = $RegisterExam->id;
            $create->type = 0;
            $create->summation = 0;
            $create->status = "กำลังดำเนินการ";
            $create->save();
        }


        if ($checkCount < $RegisterExam->unit) {

            $checkdupicate = examgroup::where('group', '=', Auth::user()->group)->where('exam_id', '=', $RegisterExam->id)->first();
            if ($checkdupicate) {

                return redirect()->route('RegisterExam.index')->with('message', 'ไม่สามารถลงทะเบียนได้เนื่องจากได้ลงทะเบียนแล้ว')->with('messagetype', 'error');
            } else {

                $listRegister = examgroup::join('calendar', 'exam_group.exam_id', '=', 'calendar.id')->select('summation')->where('group', '=', $request->group)->where('title', '=', $RegisterExam->title)->get();


                if (isset($listRegister[0]->summation)) {

                    if ($listRegister[0]->summation / 5 * 100 > 80) {

                        return redirect()->route('RegisterExam.index')->with('message', 'ไม่สามารถลงทะเบียนได้เนื่อง ท่านได้ผ่านการสอบประเภทนี้แล้ว')->with('messagetype', 'error');
                    } else {

                        //สมัครแล้วยังไม่ผ่าน
                        create($RegisterExam);
                        return redirect()->route('RegisterExam.index')->with('message', 'ลงทะเบียนสอบสำเร็จ')->with('messagetype', 'success');
                    }
                } else {
                    create($RegisterExam);
                    return redirect()->route('RegisterExam.index')->with('message', 'ลงทะเบียนสอบสำเร็จ')->with('messagetype', 'success');
                }
            }
        } else {
            return redirect()->route('RegisterExam.index')->with('message', 'ไม่สามารถลงทะเบียนได้ เนื่องจากเต็มจำนวนเเล้ว')->with('messagetype', 'warning');
        }
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
