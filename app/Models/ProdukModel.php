<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'kode_produk',
        'id_kategori',
        'nama_produk',
        'brand',
        'skala',
        'deskripsi',
        'gambar',
        'harga',
        'stok',
        'is_active',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
    }

    public function keranjang()
    {
        return $this->hasMany(KeranjangModel::class, 'id_produk', 'id_produk');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_produk', 'id_produk');
    }
}
