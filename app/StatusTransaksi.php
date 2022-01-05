<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTransaksi extends Model
{
    protected $primaryKey = 'id_pengiriman';
    //deklarasikan nama tabel di db
    protected $table = 'status_transaksi';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_transaksi',
        'waktu_checkpoint',
        'status_pengiriman'];
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi', 'id_transaksi', 'id_transaksi');
    }
}
