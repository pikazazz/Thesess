<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\student\groupModel;

use Illuminate\Support\Facades\File;

class fileManage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        if ($request->type == 'proposal' && $request->extension == 'pdf') {
            $input = $request->all();
            $input['file'] = '';
            if ($image = $request->file('file')) {
                $destinationPath = 'groups/' . Auth::user()->group . '/proposal';
                $file = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $file);
                $input['file'] = "$file";
            }

            $group = groupModel::find(Auth::user()->group);
            $group->path_proposal = "$destinationPath" . "/" . "$file";
            $group->save();

            return redirect()->route('Group.index')->with('messagesok','เพิ่มไฟล์สำเร็จ')->with('messagetype','success');
        } else if ($request->type != 'proposal' && $request->chapter1 == 'pdf') {
            $input = $request->all();
            $input['file'] = '';
            if ($image = $request->file('file')) {
                $destinationPath = 'groups/' . Auth::user()->group . '/' . $request->type;
                $file = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $file);
                $input['file'] = "$file";
            }
            $group = groupModel::find(Auth::user()->group);
            $group->path_ch1 = "$destinationPath" . "/" . "$file";
            $group->save();
            return redirect()->route('Group.index')->with('messagesok','เพิ่มไฟล์สำเร็จ')->with('messagetype','success');


        } else if ($request->type != 'proposal' && $request->chapter2 == 'pdf') {
            $input = $request->all();
            $input['file'] = '';
            if ($image = $request->file('file')) {
                $destinationPath = 'groups/' . Auth::user()->group . '/' . $request->type;
                $file = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $file);
                $input['file'] = "$file";
            }
            $group = groupModel::find(Auth::user()->group);
            $group->path_ch2 = "$destinationPath" . "/" . "$file";
            $group->save();
            return redirect()->route('Group.index')->with('messagesok','เพิ่มไฟล์สำเร็จ')->with('messagetype','success');
        } else if ($request->type != 'proposal' && $request->chapter3 == 'pdf') {
            $input = $request->all();
            $input['file'] = '';
            if ($image = $request->file('file')) {
                $destinationPath = 'groups/' . Auth::user()->group . '/' . $request->type;
                $file = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $file);
                $input['file'] = "$file";
            }
            $group = groupModel::find(Auth::user()->group);
            $group->path_ch3 = "$destinationPath" . "/" . "$file";
            $group->save();
            return redirect()->route('Group.index')->with('messagesok','เพิ่มไฟล์สำเร็จ')->with('messagetype','success');
        } else if ($request->type != 'proposal' && $request->chapter4 == 'pdf') {
            $input = $request->all();
            $input['file'] = '';
            if ($image = $request->file('file')) {
                $destinationPath = 'groups/' . Auth::user()->group . '/' . $request->type;
                $file = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $file);
                $input['file'] = "$file";
            }
            $group = groupModel::find(Auth::user()->group);
            $group->path_ch4 = "$destinationPath" . "/" . "$file";
            $group->save();
            return redirect()->route('Group.index')->with('messagesok','เพิ่มไฟล์สำเร็จ')->with('messagetype','success');
        } else if ($request->type != 'proposal' && $request->chapter5 == 'pdf') {
            $input = $request->all();
            $input['file'] = '';
            if ($image = $request->file('file')) {
                $destinationPath = 'groups/' . Auth::user()->group . '/' . $request->type;
                $file = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $file);
                $input['file'] = "$file";
            }
            $group = groupModel::find(Auth::user()->group);
            $group->path_ch5 = "$destinationPath" . "/" . "$file";
            $group->save();
            return redirect()->route('Group.index')->with('messagesok','เพิ่มไฟล์สำเร็จ')->with('messagetype','success');
        } else {
            return redirect()->route('Group.index')->with('messagesok','ประเภทไฟล์ไม่ถูกต้อง ลองใหม่ด้วยไฟล์ PDF')->with('messagetype','error');

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

        if ($request->typedel == 'proposal') {
            $destinationPath = 'groups/' . Auth::user()->group . '/proposal';
            $folderPath = public_path($destinationPath);
            $response = File::deleteDirectory($folderPath);

            $rm =    groupModel::find($id);
            $rm->path_proposal = null;
            $rm->save();
            // dd($response,$folderPath);

            return redirect()->route('Group.index')->with('messagesok','ลบไฟล์สำเร็จ')->with('messagetype','success');

        } else if ($request->typedel == 'ch1') {
            $destinationPath = 'groups/' . Auth::user()->group . '/ch1';
            $folderPath = public_path($destinationPath);
            $response = File::deleteDirectory($folderPath);

            $rm =    groupModel::find($id);
            $rm->path_ch1 = null;
            $rm->save();
            // dd($response,$folderPath);

            return redirect()->route('Group.index')->with('messagesok','ลบไฟล์สำเร็จ')->with('messagetype','success');
        } else if ($request->typedel == 'ch2') {
            $destinationPath = 'groups/' . Auth::user()->group . '/ch2';
            $folderPath = public_path($destinationPath);
            $response = File::deleteDirectory($folderPath);
            $rm =    groupModel::find($id);
            $rm->path_ch2 = null;
            $rm->save();
            // dd($response,$folderPath);

            return redirect()->route('Group.index')->with('messagesok','ลบไฟล์สำเร็จ')->with('messagetype','success');


        } else if ($request->typedel == 'ch3') {
            $destinationPath = 'groups/' . Auth::user()->group . '/ch3';
            $folderPath = public_path($destinationPath);
            $response = File::deleteDirectory($folderPath);

            $rm =    groupModel::find($id);
            $rm->path_ch3 = null;
            $rm->save();
            // dd($response,$folderPath);

            return redirect()->route('Group.index')->with('messagesok','ลบไฟล์สำเร็จ')->with('messagetype','success');
        } else if ($request->typedel == 'ch4') {
            $destinationPath = 'groups/' . Auth::user()->group . '/ch4';
            $folderPath = public_path($destinationPath);
            $response = File::deleteDirectory($folderPath);

            $rm =    groupModel::find($id);
            $rm->path_ch4 = null;
            $rm->save();
            // dd($response,$folderPath);

            return redirect()->route('Group.index')->with('messagesok','ลบไฟล์สำเร็จ')->with('messagetype','success');
        } else if ($request->typedel == 'ch5') {
            $destinationPath = 'groups/' . Auth::user()->group . '/ch5';
            $folderPath = public_path($destinationPath);
            $response = File::deleteDirectory($folderPath);

            $rm =    groupModel::find($id);
            $rm->path_ch5 = null;
            $rm->save();
            // dd($response,$folderPath);

            return redirect()->route('Group.index')->with('messagesok','ลบไฟล์สำเร็จ')->with('messagetype','success');
        }
    }
}
