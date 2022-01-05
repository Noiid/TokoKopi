<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    protected $primaryKey = 'id_petani';
    //deklarasikan nama tabel di db
    protected $table = 'petani';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'nama_petani',
        'alamat_petani',
        'telp_petani',
        'gambar_petani'];
}
