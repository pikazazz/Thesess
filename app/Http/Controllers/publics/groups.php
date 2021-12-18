<?php

namespace App\Http\Controllers\publics;

use Illuminate\Support\Facades\Auth;
use App\Models\student\groupModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class groups extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.public.group.home');
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
        if (Auth::user()->group = $id) {
            return view('components.public.group.home');
        } else {
            return view('components.public.group.home');
        }
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
        $editGroup = groupModel::find($id);
        $editGroup->group_name = $request->group_name;
        $editGroup->path_img_group = $request->path_img_group;
        $editGroup->co_teacher = $request->co1;
        $editGroup->co_teacher_2 = $request->co2;
        $editGroup->co_teacher_3 = $request->co3;
        $editGroup->save();
        return redirect()->route('Group.index', ['messagesok' => '4']);

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
