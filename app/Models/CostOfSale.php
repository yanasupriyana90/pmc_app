<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostOfSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'selling_buying_id',
        'item_name',
        'volume',
        'price',
        'actual_amt',
        'tax_rate',
        'tax_amt',
        'final_amount',
    ];

    public function sellingBuying()
    {
        return $this->belongsTo(SellingBuying::class, 'selling_buying_id', 'id');
    }
}
