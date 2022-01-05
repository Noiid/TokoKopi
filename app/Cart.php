<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'id_cart';
    //deklarasikan nama tabel di db
    protected $table = 'cart';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_produk',
        'id',
        'qty_cart'];
    

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk', 'id_produk');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id');
    }
}
