<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListLayanan extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'list_layanan';
    protected $fillable = [
        'id_layanan',
        'nama',
    ];

    public function Layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }

}