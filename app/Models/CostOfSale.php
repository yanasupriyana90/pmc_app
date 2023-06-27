<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostOfSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'volume',
        'price',
        'actual_amt',
        'tax_rate',
        'tax_amt',
        'final_amount',
        'selling_buying_id',
        'user_id',
    ];
}
