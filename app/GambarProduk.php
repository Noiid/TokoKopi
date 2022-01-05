<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    protected $primaryKey = 'id_gambar_produk';
    //deklarasikan nama tabel di db
    protected $table = 'gambar_produk';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_produk',
        'gambar_produk'];
    
    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk', 'id_produk');
    }
}
