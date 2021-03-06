<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\groupModel;
use App\Models\teacher\request_group;
use Illuminate\Support\Facades\Auth;

class joingroup extends Controller
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

        $group = groupModel::where('teacher', '=', null)->get();


        return view('components.teacher.joingroup.home', ['group' => $group]);
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


        $checksend = request_group::where('request_receiver', '=', $data->std_first)->where('request_sender', '=', Auth::user()->id)->get()->count();

        if ($checksend > 0) {
            return redirect()->route('JoinGroup.index')->with('messagesok', 'ส่งคำเชิญซ้ำ')->with('messagetype', 'error');
        } else {
            $insert = new request_group();
            $insert->request_sender = Auth::user()->id;
            $insert->request_receiver = $data->std_first;
            $insert->status = 'waiting';
            $insert->save();

            return redirect()->route('JoinGroup.index')->with('messagesok', 'ส่งคำเชิญสำเร็จ')->with('messagetype', 'success');
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
    public function destroy($id)
    {
        //
    }
}
