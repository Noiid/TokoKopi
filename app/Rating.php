<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $primaryKey = 'id_rating';
    //deklarasikan nama tabel di db
    protected $table = 'rating';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'besar_rating'];
    

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk', 'id_produk');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi', 'id_transaksi', 'id_transaksi');
    }
}
