<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','telp_user','id_level','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level()
    {
        return $this->belongsTo('App\UserLevel', 'id_level', 'id_level');
    }
    public function artikel()
    {
        return $this->hasMany('App\Artikel', 'id', 'id');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Transaksi', 'id', 'id');
    }
    public function cart()
    {
        return $this->hasMany('App\Cart', 'id', 'id');
    }
}
