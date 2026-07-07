<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';

    protected $primaryKey = 'id_keranjang';
    
    protected $fillable = [
        'id_user',
        'id_produk',
        'jumlah',
        'subtotal',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id_produk');
    }
}
