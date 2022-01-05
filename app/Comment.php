<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id_comment';
    //deklarasikan nama tabel di db
    protected $table = 'comment';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_produk',
        'id_transaksi',
        'isi_comment'];
    

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_produk', 'id_produk');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi', 'id_transaksi', 'id_transaksi');
    }
    public function gambar_comment()
    {
        return $this->hasMany('App\GambarComment', 'id_comment', 'id_comment');
    }
}
