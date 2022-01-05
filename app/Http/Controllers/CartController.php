<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaksi;
use App\TransaksiProduk;
use Illuminate\Http\Request;

class CartController extends Controller
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
        Cart::create([
            'id_produk' => $request->id_produk,
            'id' => $request->id,
            'qty_cart' => $request->qty
        ]);
        
        return redirect('/cart')->with('success','Berhasil menambahkan produk ke keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $carts = Cart::where('id',auth()->user()->id)->orderBy('id_cart','desc')->get();
        return view('user.cart.keranjang',[
            'carts' => $carts
        ]);
    }

    public function checkout(Request $request)
    {
        // dd(count($request->id_cart));
        for ($i=0; $i < count($request->id_cart) ; $i++) { 
            if (isset($request->id_cart[$i])) {
                // dd($request->id_cart[$i]);
                
                $qty = (int)$request->cart1[$i];
                // dd($qty);
                Cart::find($request->id_cart[$i])->update([
                    'qty_cart' => $qty
                ]);
                // dd(Cart::find($request->id_cart[$i]));

            }
        }
        $carts = Cart::where('id',auth()->user()->id)->whereIn('id_cart',$request->id_cart)->orderBy('id_cart','desc')->get();
        $jum_produk = 0;
        $subtotal = 0;
        foreach ($carts as $cart) {
            $jum_produk += $cart->qty_cart;
            $subtotal += $cart->qty_cart * $cart->produk->harga_produk;
        }
        return view('user.cart.checkout',[
            'carts' => $carts,
            'jum_produk' => $jum_produk,
            'subtotal' => $subtotal
        ]);
    }

    public function cek_pengiriman(Request $request)
    {
        $id = $request->id;
        $alamat = $request->alamat_pengiriman;
        $tanggal = date('Y-m-d h:i:s');
        $subtotal = $request->subtotal;
        $status = 'Cek Ongkos Kirim';

        $tr = new Transaksi();
        $tr->id = $id;
        $tr->kode_transaksi = $id;
        $tr->tgl_transaksi = $tanggal;
        $tr->alamat_pengiriman = $alamat;
        $tr->total_bayar = $subtotal;
        $tr->status_transaksi = $status;
        $tr->save();

        for ($i=0; $i < count($request->id_produk); $i++) { 
            TransaksiProduk::create([
                'id_produk' => $request->id_produk[$i],
                'id_transaksi' => $tr->id_transaksi,
                'qty_transaksi' => $request->qty_cart[$i],
                'harga_transaksi' => $request->harga_produk[$i]
            ]);

            Cart::where('id',$id)->where('id_produk',$request->id_produk[$i])->delete();
        }
        return redirect()->route('profil');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::find($id)->delete();

        return back()->with('success','Berhasil menghapus produk dari keranjang belanja!');
    }
}
