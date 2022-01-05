<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $primaryKey = 'id_level';
    //deklarasikan nama tabel di db
    protected $table = 'user_level';
    //deklarasi field yang bisa diisi pada table
    protected $fillable = [
        'deskripsi_level'];
    
    public function user()
    {
        return $this->hasMany('App\User', 'id_level', 'id_level');
    }
}
