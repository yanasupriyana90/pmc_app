<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContSealDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cont_seal',
        'qty',
        // 'type_pack_id ',
        'net_weight',
        'net_type_weight',
        'gross_weight',
        'gross_type_weight',
        'measurement',
        'type_measurement',
        // 'job_sheet_head_id',
    ];
}
