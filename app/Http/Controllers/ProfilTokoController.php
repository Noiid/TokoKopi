<?php

namespace App\Http\Controllers;

use App\ProfilToko;
use App\Sosmed;
use Illuminate\Http\Request;

class ProfilTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil_toko = ProfilToko::first();
        $sosmed = Sosmed::orderBy('id_sosmed','desc')->get();
        // dd($profil_toko);
        return view('admin.profil.index',['profil' => $profil_toko, 'sosmed' => $sosmed]);
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
        ProfilToko::create($request->all());

        return back()->with('success','Berhasil mengubah data profil toko!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfilToko  $profilToko
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilToko $profilToko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfilToko  $profilToko
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilToko $profilToko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfilToko  $profilToko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        ProfilToko::find($request->id_toko)->update($request->all());

        return back()->with('success','Berhasil mengubah data profil toko!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfilToko  $profilToko
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilToko $profilToko)
    {
        //
    }
}
