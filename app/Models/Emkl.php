<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emkl extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'price',
        'tax_rate',
        'tax_amt',
        'final_amount',
        'selling_buying_id',
        'user_id',
    ];
}
