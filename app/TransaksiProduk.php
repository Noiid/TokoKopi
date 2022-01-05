<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiProduk extends Model
{
    protected $primaryKey = 'id_transaksi_produk';
    //deklarasikan nama tabel di db
    protected $table = 'transaksi_produk';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_produk',
        'id_transaksi',
        'qty_transaksi',
        'harga_transaksi'];
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi', 'id_transaksi', 'id_transaksi');
    }

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk', 'id_produk');
    }
}
