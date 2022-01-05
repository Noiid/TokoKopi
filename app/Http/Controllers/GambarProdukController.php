<?php

namespace App\Http\Controllers;

use App\GambarProduk;
use App\Produk;
use Illuminate\Http\Request;

class GambarProdukController extends Controller
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
        $nama_produk = Produk::find($request->id_produk)->nama_produk;
        request()->validate([
            'file' => 'required',
            'file.*' => 'required|mimes:jpeg,jpg,png|max:5120'
        ],
        [
            'file.*.max' => 'File gambar maksimal berukuran 5MB!',
            'file.*.mimes' => 'File gambar harus berekstensi jpg,jpeg,png!'
        ]);

        if($request->hasfile('file')) { 
            foreach($request->file('file') as $file){
                $fileName = $nama_produk.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName.'.'.$file->getClientOriginalExtension();
                
                GambarProduk::create([
                    'id_produk' => $request->id_produk,
                    'gambar_produk' => 'produk/'.$fileName
                ]); 
                $path = $file->storeAs('public/produk',$fileName);
            }
            
        }

        return back()->with('success','Berhasil menambahkan foto produk!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function show(GambarProduk $gambarProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(GambarProduk $gambarProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GambarProduk $gambarProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GambarProduk  $gambarProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cariFile = GambarProduk::find($id);
        unlink(storage_path('app/public/'.$cariFile->gambar_produk));

        $cariFile->delete();

        return back()->with('success','Berhasil menghapus foto produk!');
    }
}
