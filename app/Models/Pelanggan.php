<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'pelanggan';

    protected $fillable = [
        'kode_member',
        'nama_lengkap',
        'jenis_kelamin',
        'email',
        'no_hp',
        'alamat',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan', 'id');
    }

}
