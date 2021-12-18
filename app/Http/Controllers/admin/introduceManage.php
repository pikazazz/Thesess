<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\admins\news;
use App\Models\admins\category;
use Illuminate\Support\Facades\Auth;

class introduceManage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = news::get();
        $category = category::get();
       
        return view('components.admin.introduce.home', ['category' => $category, 'news' => $news]);
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

        if ($request->type == 'category') {
            $crateCategory = new category();
            $crateCategory->category_name = $request->category_name;
            $crateCategory->creator = Auth::user()->id;
            $crateCategory->save();


            $news = news::get();
            $category = category::get();

            return view('components.admin.introduce.redirect', ['category' => $category, 'news' => $news]);
        } else {
            $cratenews = new news();
            $cratenews->category_id = $request->category_id;
            $cratenews->news_name = $request->news_name;
            $cratenews->news_detail = $request->news_detail;
            $cratenews->creator = Auth::user()->id;
            $cratenews->save();


            $news = news::get();
            $category = category::get();

            return view('components.admin.introduce.redirect', ['category' => $category, 'news' => $news]);
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
