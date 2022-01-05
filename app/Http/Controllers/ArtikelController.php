<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();

        return view('admin.artikel.index',[
            'artikel' => $artikel
        ]);
    }

    public function list_artikel()
    {
        $artikel = Artikel::orderBy('id_artikel','desc')->get();
        return view('user.artikel.list_artikel',[
            'artikel' => $artikel
        ]);
    }

    public function detail_artikel($id)
    {
        $artikels = Artikel::orderBy('id_artikel','desc')->take(4)->get();
        $artikel = Artikel::find($id);
        return view('user.artikel.detail_artikel',[
            'artikel' => $artikel,
            'artikels' => $artikels
        ]);
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
        request()->validate([
            'file' => 'required|mimes:jpeg,jpg,png|max:5120'
        ],
        [
            'file.max' => 'File gambar maksimal berukuran 5MB!',
            'file.mimes' => 'File gambar harus berekstensi jpg,jpeg,png!'
        ]);

        if($request->hasfile('file')) { 
            $file = $request->file('file');
            $artikel = new Artikel();
            $artikel->id = $request->id;
            $artikel->judul_artikel = $request->judul_artikel;
            $artikel->deskripsi_artikel = $request->deskripsi_artikel;
            $artikel->waktu_upload = date('Y-m-d H:i:s');
            $artikel->save();
            $id = $artikel->id_artikel;

            $fileName = 'Artikel'.$id.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName.'.'.$file->getClientOriginalExtension();

            $artikel->gambar_artikel = 'artikel/'.$fileName;
            $artikel->save();
            $path = $file->storeAs('public/artikel',$fileName);            
        }

        return back()->with('success','Berhasil menambahkan artikel!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id_artikel;
        if (isset($request->file)) {
            // dd("masuk sini bang");
            request()->validate([
                'file' => 'required|mimes:jpeg,jpg,png|max:5120'
            ],
            [
                'file.max' => 'File gambar maksimal berukuran 5MB!',
                'file.mimes' => 'File gambar harus berekstensi jpg,jpeg,png!'
            ]);
    
            if($request->hasfile('file')) { 
                $file = $request->file('file');
                $fileName = 'Artikel'.$id.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName.'.'.$file->getClientOriginalExtension();

                $cariFile = Artikel::find($id);
                unlink(storage_path('app/public/'.$cariFile->gambar_artikel));
                
                Artikel::find($id)->update([
                    'judul_artikel' => $request->judul_artikel,
                    'deskripsi_artikel' => $request->deskripsi_artikel,
                    'gambar_artikel' => 'artikel/'.$fileName
                ]); 
                $path = $file->storeAs('public/artikel',$fileName);
    
            }
        }else{
            Artikel::find($id)->update([
                'judul_artikel' => $request->judul_artikel,
                'deskripsi_artikel' => $request->deskripsi_artikel
            ]);
        }
        return back()->with('success','Berhasil mengubah data artikel!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cariFile = Artikel::find($id);
        unlink(storage_path('app/public/'.$cariFile->gambar_artikel));

        $cariFile->delete();

        return back()->with('success','Berhasil menghapus data artikel!');
    }
}
