<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id_user';
    
    protected $fillable = [
        'username',
        'email',
        'email_verified_at',
        'password',
        'role',
        'foto_profil',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function keranjang()
    {
        return $this->hasMany(KeranjangModel::class, 'id_user', 'id_user');
    }

    public function transaksi()
    {
        return $this->hasMany(TransaksiModel::class, 'id_user', 'id_user');
    }
}
