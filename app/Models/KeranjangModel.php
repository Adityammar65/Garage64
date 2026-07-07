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
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
