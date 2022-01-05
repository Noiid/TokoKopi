<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id_kategori','desc')->get();
        $produk = Produk::orderBy('id_kategori','desc')->get();

        return view('admin.produk.index',['kategori' => $kategori, 'produk' => $produk]);
    }

    public function detail_produk($id)
    {
        $produk = Produk::find($id);

        $besar_rating = 0;
        $jum = 0;
        $rating = 0;
        $jum_barang = 0;
        foreach ($produk->rating as $rating){
            $besar_rating += $rating->besar_rating;
            $jum++;
        }
        foreach ($produk->transaksi_produk as $tr) {
            $jum_barang += $tr->qty_transaksi;
        }
        if ($jum!=0) {
            $rating = $besar_rating/$jum;
        }

        $rating5 = $produk->rating->where('besar_rating','5');
        $rating4 = $produk->rating->where('besar_rating','4');
        $rating3 = $produk->rating->where('besar_rating','3');
        $rating2 = $produk->rating->where('besar_rating','2');
        $rating1 = $produk->rating->where('besar_rating','1');
        return view('user.produk.detail',[
            'produk' => $produk,
            'besar_rating' => $rating,
            'jum_barang' => $jum_barang,
            'rating5' => $rating5,
            'rating4' => $rating4,
            'rating3' => $rating3,
            'rating2' => $rating2,
            'rating1' => $rating1
        ]);
    }

    public function list_produk()
    {
        $produk = Produk::orderBy('id_kategori','desc')->get();

        return view('user.produk.list_produk',[
            'produk' => $produk
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
        Produk::create($request->all());

        return back()->with('success','Berhasil menambahkan data produk baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Produk::find($request->id_produk)->update($request->all());

        return back()->with('success','Berhasil mengubah data produk!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cariFile = Produk::find($id);
        // unlink(storage_path('app/public/'.$cariFile->img_thumbnail));

        if ($cariFile->gambar_produk->isNotEmpty()) {
            foreach ($cariFile->gambar_produk as $item) {
                unlink(storage_path('app/public/'.$item->gambar_produk));
                $item->delete();
            }
        }

        $cariFile->delete();

        return back()->with('success','Berhasil menghapus data produk beserta fotonya!');
    }

    public function detail($id)
    {
        $produk = Produk::find($id);

        return view('admin.produk.detail',[
            'produk' => $produk
        ]);
    }
}
