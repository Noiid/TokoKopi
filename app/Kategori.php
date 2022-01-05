<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $primaryKey = 'id_kategori';
    //deklarasikan nama tabel di db
    protected $table = 'kategori';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'nama_kategori'];
    
    public function produk()
    {
        return $this->hasMany('App\Produk', 'id_kategori', 'id_kategori');
    }
}
