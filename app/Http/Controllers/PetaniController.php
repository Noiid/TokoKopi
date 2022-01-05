<?php

namespace App\Http\Controllers;

use App\Petani;
use Illuminate\Http\Request;

class PetaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petani = Petani::all();

        return view('admin.petani.index',[
            'petani' => $petani
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
            $petani = new Petani();
            $petani->nama_petani = $request->nama_petani;
            $petani->alamat_petani = $request->alamat_petani;
            $petani->telp_petani = $request->telp_petani;
            $petani->save();
            $id = $petani->id_petani;

            $fileName = 'Petani'.$id.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName.'.'.$file->getClientOriginalExtension();

            $petani->gambar_petani = 'petani/'.$fileName;
            $petani->save();
            $path = $file->storeAs('public/petani',$fileName);            
        }

        return back()->with('success','Berhasil menambahkan petani!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function show(Petani $petani)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function edit(Petani $petani)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id_petani;
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
                $fileName = 'Petani'.$id.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName.'.'.$file->getClientOriginalExtension();

                $cariFile = Petani::find($id);
                unlink(storage_path('app/public/'.$cariFile->gambar_petani));
                
                Petani::find($id)->update([
                    'nama_petani' => $request->nama_petani,
                    'alamat_petani' => $request->alamat_petani,
                    'telp_petani' => $request->telp_petani,
                    'gambar_petani' => 'petani/'.$fileName
                ]); 
                $path = $file->storeAs('public/petani',$fileName);
    
            }
        }else{
            Petani::find($id)->update([
                'nama_petani' => $request->nama_petani,
                'alamat_petani' => $request->alamat_petani,
                'telp_petani' => $request->telp_petani
            ]);
        }
        return back()->with('success','Berhasil mengubah data petani!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cariFile = Petani::find($id);
        unlink(storage_path('app/public/'.$cariFile->gambar_petani));

        $cariFile->delete();

        return back()->with('success','Berhasil menghapus data petani!');
    }
}
