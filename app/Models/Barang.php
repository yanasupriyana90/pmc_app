<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'nama',
        'merk',
        'panjang',
        'lebar',
        'tinggi',
        'satuan_barang_id',
        'desk',
        'image',
        'usd',
        'stock',
        'min_stock',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function satuanBarang()
    {
        return $this->belongsTo(satuanBarang::class);
    }
}
