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

        $group = groupModel::where('teacher', '=', Auth::user()->id)->get();

        $list_names = [];
        foreach ($group as $Group) {
            $list_name = User::find($Group->std_first);
            $list_names[] = array(
                'name' => $list_name->fname . ' ' . $list_name->lname,
                'tel' => $list_name->tel
            );
        }

        foreach ($group as $Groups) {
            $list_name = User::find($Groups->std_second);
            $list_names[] = array(
                'name' => $list_name->fname . ' ' . $list_name->lname,
                'tel' => $list_name->tel
            );
        }

        return view('components.teacher.dashbroad.home', ['page' => 'list_group', 'group' => $group,'list_std'=>$list_names]);
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

        $group = groupModel::where('teacher', '=', Auth::user()->id)->get();

        $list_names = [];
        foreach ($group as $Group) {
            $list_name = User::find($Group->std_first);
            $list_names[] = array(
                'name' => $list_name->fname . ' ' . $list_name->lname,
                'tel' => $list_name->tel
            );
        }

        foreach ($group as $Groups) {
            $list_name = User::find($Groups->std_second);
            $list_names[] = array(
                'name' => $list_name->fname . ' ' . $list_name->lname,
                'tel' => $list_name->tel
            );
        }

        return view('components.teacher.dashbroad.home', ['page' => $type, 'group' => $group,'list_std'=>$list_names]);

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
