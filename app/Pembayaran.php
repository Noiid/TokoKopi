<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $primaryKey = 'id_pembayaran';
    //deklarasikan nama tabel di db
    protected $table = 'pembayaran';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_transaksi',
        'tgl_pembayaran',
        'bukti_pembayaran',
        'status_pembayaran'];
    
    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi', 'id_transaksi', 'id_transaksi');
    }
}
