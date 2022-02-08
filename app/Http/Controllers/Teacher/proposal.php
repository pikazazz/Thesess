<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\teacher\examgroup;
use App\Models\point_transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class proposal extends Controller
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

        $examgroup = examgroup::orderBy('id', 'desc')->get();
        $point_tran = point_transection::join('group', 'group.id', '=', 'point_transection.group')
            ->join('exam_group', 'exam_group.id', '=', 'point_transection.exam_id')
            ->join('calendar', 'calendar.id', '=', 'exam_group.exam_id')
            ->where('teacher_id', '=', Auth::user()->id)->get();
        return view('components.teacher.proposal.home', ['examgroup' => $examgroup, 'point_tran' => $point_tran]);
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
        $data = json_decode($request->data);


        $point_tran = point_transection::join('group', 'group.id', '=', 'point_transection.group')
            ->join('exam_group', 'exam_group.id', '=', 'point_transection.exam_id')
            ->join('calendar', 'calendar.id', '=', 'exam_group.exam_id')
            ->select('group.id as group_id', 'exam_group.id as exam_group_id', 'calendar.title as calendar_title')
            ->where('teacher_id', '=', Auth::user()->id)->where('exam_group.id', '=', $data->id)
            ->where('group.id', '=', $data->group)
            ->where('calendar.id', '=', $data->exam_id)
            ->get()->count();


        if ($point_tran > 0) {
            return redirect()->route('AddPoint.index')->with('message', 'ไม่สามารถลงคะแนนได้เนื่องจาก มีการทำรายการซ้ำ')->with('messagetype', 'error');
        } else {

            $count = point_transection::where('exam_id', '=', $data->id)->get()->count();

            if ($count > 4) {
                return redirect()->route('AddPoint.index')->with('message', 'ไม่สามารถลงคะแนนเพิ่มได้ เนื่องจากลงคะแนนเต็มแล้ว ')->with('messagetype', 'error');
            } else {
                $query = examgroup::find($data->id);
                $query->summation = $query->summation += $request->point;
                if ($query->summation / 5 * 100 > 79) {
                    $query->status = 'ผ่าน';
                } else {
                    $query->status = 'ไม่ผ่าน';
                }
                $query->save();
                $query2 = new point_transection();
                $query2->group = $data->group;
                $query2->exam_id = $data->id;
                $query2->type = $data->type;
                $query2->teacher_id = Auth::user()->id;
                $query2->point = $request->point;
                $query2->save();

                return redirect()->route('AddPoint.index')->with('message', 'ลงทะเบียนสำเร็จ ')->with('messagetype', 'success');
            }
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




        return view('components.teacher.proposal.home', ['id' => $id]);
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
    public function destroy($id)
    {
        //
    }
}
