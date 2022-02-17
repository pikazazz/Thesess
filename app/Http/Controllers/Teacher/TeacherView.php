<?php

namespace App\Http\Controllers\Teacher;

use App\Models\student\groupModel;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherView extends Controller
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

        $group = groupModel::join('users', 'group.id', '=', 'users.group')->where('teacher', '=', Auth::user()->id)
            ->get();

        $list_names = [];
        $list_name = groupModel::join('users', 'group.id', '=', 'users.group')->where('teacher', '=', Auth::user()->id)->get();
        foreach ($list_name as $List_name) {
            $list_names[] = array(
                'name' => $List_name->fname . ' ' . $List_name->lname,
                'tel' => $List_name->tel
            );
        }

        $groupEnd = groupModel::join('users', 'group.id', '=', 'users.group')->where('status', '=', 'success')->where('teacher', '=', Auth::user()->id)
            ->get();

        $groupWait = groupModel::join('users', 'group.id', '=', 'users.group')->where('status', '=', 'warning')->where('teacher', '=', Auth::user()->id)
            ->get();


        return view('components.teacher.dashbroad.home', ['page' => 'list_group', 'group' => $group, 'list_std' => $list_names, 'groupEnd' => $groupEnd, 'groupWait' => $groupWait]);
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
        switch ($id) {
            case '1':
                $type = "list_group";

                break;
            case '2':
                $type = "list_student";
                break;
            case '3':
                $type = "list_success";

                break;
            case '4':
                $type = "list_reject";

                break;
            default:
                # code...
                break;
        }

        $group = groupModel::join('users', 'group.id', '=', 'users.group')
        ->select('group.group_name', 'group.status', 'group.id')
        ->where('teacher', '=', Auth::user()->id)
            ->get();

        $list_names = [];
        $list_name = groupModel::join('users', 'group.id', '=', 'users.group')->where('teacher', '=', Auth::user()->id)->get();
        foreach ($list_name as $List_name) {
            $list_names[] = array(
                'name' => $List_name->fname . ' ' . $List_name->lname,
                'tel' => $List_name->tel,
                'group_name' => $List_name->group_name
            );
        }

        $groupEnd = groupModel::join('users', 'group.id', '=', 'users.group')
        ->select('group.group_name', 'group.status', 'group.id')
        ->where('status', '=', 'success')->where('teacher', '=', Auth::user()->id)
            ->get();

        $groupWait = groupModel::join('users', 'group.id', '=', 'users.group')
        ->select('group.group_name', 'group.status', 'group.id')
        ->where('status', '=', 'warning')->where('teacher', '=', Auth::user()->id)
            ->get();

        return view('components.teacher.dashbroad.home', ['page' => $type, 'group' => $group, 'list_std' => $list_names, 'groupEnd' => $groupEnd, 'groupWait' => $groupWait]);
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
