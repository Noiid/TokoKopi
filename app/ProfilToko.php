<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilToko extends Model
{
    protected $primaryKey = 'id_toko';
    //deklarasikan nama tabel di db
    protected $table = 'profil_toko';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'nama_toko',
        'deskripsi_toko',
        'alamat_toko',
        'nomor_telp',
        'email_toko',
        'wa_toko'];
}
