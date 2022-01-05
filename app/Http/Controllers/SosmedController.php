<?php

namespace App\Http\Controllers;

use App\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
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
        Sosmed::create($request->all());

        return back()->with('success','Berhasil menambahkan data sosmed baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function show(Sosmed $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function edit(Sosmed $sosmed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Sosmed::find($request->id_sosmed)->update($request->all());

        return back()->with('success','Berhasil mengubah data sosmed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sosmed::find($id)->delete();

        return back()->with('success','Berhasil menghapus data sosmed!');
    }
}
