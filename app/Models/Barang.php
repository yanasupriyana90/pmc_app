<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama',
        'kategori_barang_id',
        'merk',
        'panjang',
        'lebar',
        'tinggi',
        'satuan_barang_id',
        'desk',
        'image',
        'harga_modal_usd',
        'exchange',
        'harga_modal_idr',
        'harga_jual',
        'stock',
        'min_stock',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoriBarang()
    {
        return $this->belongsTo(kategoriBarang::class);
    }

    public function satuanBarang()
    {
        return $this->belongsTo(satuanBarang::class);
    }
}
