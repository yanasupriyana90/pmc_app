<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SellingBuying extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_sheet_head_id',
        'exchange_rate_ros',
        'exchange_rate_cos',
        'grand_total_selling',
        'grand_total_buying',
        'remark',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jobSheetHead()
    {
        return $this->hasOne(JobSheet::class, 'job_sheet_head_id', 'id');
    }


    public function ros()
    {
        return $this->hasMany(RevenueOfSale::class, 'selling_buying_id', 'id');
    }
    public function emkl()
    {
        return $this->hasMany(Emkl::class, 'selling_buying_id', 'id');
    }
    public function cos()
    {
        return $this->hasMany(CostOfSale::class, 'selling_buying_id', 'id');
    }
    public function handling()
    {
        return $this->hasMany(Handling::class, 'selling_buying_id', 'id');
    }
}
