<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueOfSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'volume',
        'unit_cost',
        'amount',
        'remarks',
        'selling_buying_id',
        'user_id',
    ];
}
