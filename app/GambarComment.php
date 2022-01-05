<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarComment extends Model
{
    protected $primaryKey = 'id_gambar_comment';
    //deklarasikan nama tabel di db
    protected $table = 'gambar_comment';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'id_comment',
        'gambar_comment'];
    
    public function comment()
    {
        return $this->belongsTo('App\Comment', 'id_comment', 'id_comment');
    }
}
