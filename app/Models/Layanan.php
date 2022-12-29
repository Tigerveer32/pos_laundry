<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'layanan';
    protected $fillable = [
        'nama_layanan',
        'thumbnail',
        'harga',
        'berat',
        'status',
        'deleted_at'.
        'created_at',
        'updated_at'
    ];


    public function List()
    {
        return $this->hasMany(Listlayanan::class, 'id_layanan', 'id');
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_layanan', 'id');
    }
}