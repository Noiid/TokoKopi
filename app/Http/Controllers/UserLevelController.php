<?php

namespace App\Http\Controllers;

use App\UserLevel;
use Illuminate\Http\Request;

class UserLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lvl = UserLevel::orderBy('id_level','desc')->get();

        return view('admin.user_level.index',['level' => $lvl]);
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
        UserLevel::create($request->all());

        return back()->with('success','Berhasil menambahkan data user level baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function show(UserLevel $userLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLevel $userLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        UserLevel::find($request->id_level)->update($request->all());

        return back()->with('success','Berhasil mengubah data user level!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserLevel  $userLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserLevel::find($id)->delete();

        return back()->with('success','Berhasil menghapus data user level!');

    }
}
