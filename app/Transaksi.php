<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'id_transaksi';
    //deklarasikan nama tabel di db
    protected $table = 'transaksi';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id',
        'kode_transaksi',
        'tgl_transaksi',
        'alamat_pengiriman',
        'biaya_pengiriman',
        'total_bayar',
        'status_transaksi',
        'info_pengiriman'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id');
    }
    public function status_transaksi()
    {
        return $this->hasMany('App\StatusTransaksi', 'id_transaksi', 'id_transaksi');
    }
    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'id_transaksi', 'id_transaksi');
    }
    public function rating()
    {
        return $this->hasMany('App\Rating', 'id_transaksi', 'id_transaksi');
    }
    public function transaksi_produk()
    {
        return $this->hasMany('App\TransaksiProduk', 'id_transaksi', 'id_transaksi');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment', 'id_transaksi', 'id_transaksi');
    }
}
