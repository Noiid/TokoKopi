<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $primaryKey = 'id_artikel';
    //deklarasikan nama tabel di db
    protected $table = 'artikel';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id',
        'judul_artikel',
        'deskripsi_artikel',
        'waktu_upload',
        'gambar_artikel'];
    

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id');
    }
}
