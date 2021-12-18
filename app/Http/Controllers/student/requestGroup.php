<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\request_group;
use App\Models\student\groupModel;
use App\Models\student\myaccountmodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class requestGroup extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.student.request-group.home');
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
            return view('components.student.request-group.home');
        } else if ($request->appove) {
            request_group::where('std_sender', '=', Auth::user()->id)->update(['status' => 'cancel']);
            request_group::where('std_receiver', '=', Auth::user()->id)->update(['status' => 'cancel']);

            $listappove = request_group::find($id);
            $listappove->status = "success";
            $listappove->save();

            request_group::where('std_sender', '=',  $listappove->std_sender)->update(['status' => 'cancel']);
            request_group::where('std_receiver', '=',  $listappove->std_sender)->update(['status' => 'cancel']);
            request_group::where('std_receiver', '=',  $listappove->std_receiver)
            ->where('std_sender', '=',  $listappove->std_sender)
            ->update(['status' => 'success']);


            $group = new groupModel;
            $group->std_first = $listappove->std_sender;
            $group->std_second = $listappove->std_receiver;
            $group->save();


            $std_1 = myaccountmodel::find($listappove->std_sender);
            $std_1->group = $group->id;
            $std_1->save();

            $std_2 = myaccountmodel::find($listappove->std_receiver);
            $std_2->group = $group->id;
            $std_2->save();

            return view('components.student.request-group.home');
        } else {
            $cancelRequest = request_group::find($id);
            $cancelRequest->status = "cancel";
            $cancelRequest->save();
            return view('components.student.request-group.home');
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
