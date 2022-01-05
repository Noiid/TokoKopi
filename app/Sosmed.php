<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $primaryKey = 'id_sosmed';
    //deklarasikan nama tabel di db
    protected $table = 'sosmed';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'jenis_sosmed',
        'nama_sosmed'];
}
