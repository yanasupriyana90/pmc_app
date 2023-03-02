<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailySalesReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_daily_sales_report',
        'date_report',
        'shipper',
        'address',
        'pic_name',
        'phone_1',
        'phone_2',
        'fax',
        'email',
        'website',
        'commodity',
        'destination',
        'remarks',
        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
