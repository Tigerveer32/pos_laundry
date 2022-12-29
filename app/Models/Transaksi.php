<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transaksi';

    protected $fillable = [
        'id_pelanggan',
        'id_layanan',
        'no_order',
        'nama',
        'no_hp',
        'berat',
        'diskon',
        'total_harga',
        'total_diskon',
        'grand_total',
        'status_pesanan',
        'status_pembayaran',
        'alamat',
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tanggal'
    ];

    public function Pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function Layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }

}
