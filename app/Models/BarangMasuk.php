<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'tanggal_pembelian',
        'nomor_invoice',
        'total_harga',
        'keterangan',
        'user_id',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateTransactionCode()
    {
        $latest = self::latest()->first();
        $number = $latest ? (intval(substr($latest->nomor_invoice, -5)) + 1) : 1;

        return 'TRBK-' . date('dmy') . '-' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }
}
