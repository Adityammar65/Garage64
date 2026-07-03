<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';
    
    protected $fillable = [
        'id_user',
        'total_qty',
        'total_harga',
        'alamat_tujuan',
        'catatan',
        'metode_bayar',
        'status',
        'resi',
        'dibayar_pada',
    ];

    protected $casts = [
        'dibayar_pada' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
