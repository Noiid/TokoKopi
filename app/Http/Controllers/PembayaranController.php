<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\User;
use App\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
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
        request()->validate([
            'file' => 'required|mimes:jpeg,jpg,png,pdf|max:5120'
        ],
        [
            'file.max' => 'File gambar maksimal berukuran 5MB!',
            'file.mimes' => 'File gambar harus berekstensi jpg,jpeg,png,pdf!'
        ]);

        if($request->hasfile('file')) { 
            $user = User::find(auth()->user()->id);
            $file = $request->file('file');
            $bayar = new Pembayaran();
            $bayar->id_transaksi = $request->id_transaksi;
            $bayar->tgl_pembayaran = date('Y-m-d');
            $bayar->status_pembayaran = 'Kirim';
            $fileName = 'Pembayaran_'.$user->name.'_'.time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName.'.'.$file->getClientOriginalExtension();
            $bayar->bukti_pembayaran = 'pembayaran/'.$fileName;
            $bayar->save();
            $path = $file->storeAs('public/pembayaran',$fileName);     
            
            Transaksi::find($request->id_transaksi)->update([
                'status_transaksi' => 'Melakukan Pembayaran'
            ]);
        }

        return back()->with('success','Berhasil unggah bukti pembayaran!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }

    public function download($id)
    {
        $cariFile = Pembayaran::find($id);
        $path = storage_path('app/public/'.$cariFile->bukti_pembayaran);

        return response()->download($path);
    }

    public function acc($id)
    {
        Pembayaran::find($id)->update([
            'status_pembayaran' => 'Valid'
        ]);

        $transaksi = Pembayaran::find($id)->transaksi;
        $transaksi->status_transaksi = 'Menunggu Dikirim';
        $transaksi->save();

        return back()->with('success','Berhasil mem-validasi pembayaran');
    }
    public function reject($id)
    {
        Pembayaran::find($id)->update([
            'status_pembayaran' => 'Tidak Valid'
        ]);

        return back()->with('success','Berhasil mem-validasi pembayaran');
    }
}
