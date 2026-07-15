<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';
    
    protected $fillable = [
        'id_user',
        'order_id',
        'transaction_id',
        'snap_token',
        'payment_type',
        'payment_status',
        'expired_at',
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
        'expired_at' => 'datetime',
        'dibayar_pada' => 'datetime',
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
