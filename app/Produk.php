<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $primaryKey = 'id_produk';
    //deklarasikan nama tabel di db
    protected $table = 'produk';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_kategori',
        'nama_produk',
        'harga_produk',
        'berat',
        'kadaluarsa',
        'stok',
        'deskripsi_produk'];
    
    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }
    public function transaksi_produk()
    {
        return $this->hasMany('App\TransaksiProduk', 'id_produk', 'id_produk');
    }
    public function cart()
    {
        return $this->hasMany('App\Cart', 'id_produk', 'id_produk');
    }
    public function gambar_produk()
    {
        return $this->hasMany('App\GambarProduk', 'id_produk', 'id_produk');
    }
    public function rating()
    {
        return $this->hasMany('App\Rating', 'id_produk', 'id_produk');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment', 'id_produk', 'id_produk');
    }
}
