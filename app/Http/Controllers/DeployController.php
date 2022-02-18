<?php

namespace App\Http\Controllers;

use App\Models\deploy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeployController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('deploy_list')->where('Group', '=', Auth::user()->group)->get();

        return view('components.public.group.from', ['data' => $list]);
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


        $result = deploy::create($request->all());
        return redirect()->route('Group.index');
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
        $result = deploy::find($id);
        $result->Fornt_End_Path = $request->Fornt_End_Path;
        $result->Back_End_Path = $request->Back_End_Path;
        $result->Back_End_Path = $request->Back_End_Path;
        $result->Type_Fornt = $request->Type_Fornt;
        $result->Type_BackEnd = $request->Type_BackEnd;
        $result->User_Database = $request->User_Database;
        $result->Password_Database = $request->Password_Database;
        $result->Database = $request->Database;
        $result->Database_Type = $request->Database_Type;
        $result->save();


        return redirect()->route('Group.index');
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
