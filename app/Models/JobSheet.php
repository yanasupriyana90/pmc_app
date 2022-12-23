<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_jb',
        'booking_no',
        'shipper_id',
        'undername_id',
        'consignee_id',
        'notify_party_id',
        'carrier',
        'vessel',
        'etd',
        'pol',
        'pod',
        'open_cy',
        'closing_doc',
        'closing_cy',
        'volume',
        'cont_size_type_id',
        'qty',
        'type_packaging_id',
        'commodity_mbl',
        'mbl_type_bl_id',
        'bl_delivery',
        'bl_delivery_desc',
        'issue_loc',
        'commodity_hbl',
        'hbl_type_bl_id',
        'gross_weight',
        'gross_type_weight_id',
        'net_weight',
        'net_type_weight_id',
        'measurement',
        'type_measurement_id',
        'stuffing_date',
        'stuffing_address',
        'pic_name',
        'pic_phone',
        'top',
        'type_payment_id',
        'remaks',
        'file_shipping_path',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function shipper()
    {
        return $this->belongsTo(shipper::class);
    }
}
