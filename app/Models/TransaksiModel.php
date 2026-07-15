<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';
    
    protected $fillable = [
        'kode_transaksi',
        'id_user',
        'total_qty',
        'total_harga',
        'alamat_tujuan',
        'catatan',
        'metode_bayar',
        'payment_type',
        'status',
        'transaction_id',
        'snap_token',
        'fraud_status',
        'resi',
        'dibayar_pada',
        'expired_at',
    ];

    protected $casts = [
        'dibayar_pada' => 'datetime',
        'expired_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksiModel::class, 'id_transaksi', 'id_transaksi');
    }
}
