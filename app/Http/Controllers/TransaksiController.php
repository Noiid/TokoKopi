<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::where('status_transaksi','!=','Selesai')->orderBy('created_at','desc')->get();

        return view('admin.transaksi.proses',[
            'transaksi' => $transaksi
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $transaksi = Transaksi::where('status_transaksi','=','Selesai')->orderBy('created_at','desc')->get();

        return view('admin.transaksi.selesai',[
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update_ongkir(Request $request)
    {
        $total = Transaksi::find($request->id_transaksi)->total_bayar;
        $total += $request->biaya_pengiriman;
        Transaksi::find($request->id_transaksi)->update([
            'biaya_pengiriman' => $request->biaya_pengiriman,
            'total_bayar' => $total,
            'status_transaksi' => 'Menunggu Pembayaran'
        ]);

        return back()->with('success','Berhasil konfirmasi biaya pengiriman');
    }

    public function update_pengiriman(Request $request)
    {
        Transaksi::find($request->id_transaksi)->update([
            'info_pengiriman' => $request->info_pengiriman,
            'status_transaksi' => 'Telah Dikirim'
        ]);

        return back()->with('success','Berhasil konfirmasi informasi pengiriman');

    }

    public function konfirmasi_selesai($id)
    {
        Transaksi::find($id)->update([
            'status_transaksi' => 'Selesai'
        ]);

        return back()->with('success','Berhasil konfirmasi barang telah diterima. Berikan rating dan komentar atas produk yang sudah dibeli.');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function chart()
    {
        $transaksi = Transaksi::all();
        $c = collect();
        $year = date("Y");
        for ($i=1; $i <= 12; $i++) { 
            $count = count(Transaksi::whereYear('created_at',$year)->whereMonth('created_at',$i)->get());
            $c->add(['jumlah' => $count]);
        }

        return response()->json($c);
    }
}
