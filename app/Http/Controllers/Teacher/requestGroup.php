<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\student\groupModel;
use App\Models\student\myaccountmodel;
use App\Models\teacher\request_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class requestGroup extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.teacher.request-group.home');
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
            $cancelRequest = request_group::find($id);
            $cancelRequest->status = "reject";
            $cancelRequest->save();
            return view('components.teacher.request-group.home');
        } else if ($request->appove) {
            $update_request = request_group::find($id);
            $update_request->status = 'success';
            $update_request->save();

            groupModel::where('std_first', '=', $update_request->request_sender)
                ->orWhere('std_second', '=', $update_request->request_sender)
                ->update(['teacher' => Auth::user()->id]);

            return view('components.teacher.request-group.home');
        } else {
            $cancelRequest = request_group::find($id);
            $cancelRequest->status = "cancel";
            $cancelRequest->save();
            return view('components.teacher.request-group.home');
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
