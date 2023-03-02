<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobSheet extends Model
{
    use HasFactory;

    public $table = "job_sheet_heads";

    protected $fillable = [
        'code_js',
        'booking_no',
        'shipper_id',
        'undername_mbl_id',
        'undername_hbl_id',
        'name_cons',
        'address_cons',
        'phone_1_cons',
        'phone_2_cons',
        'fax_cons',
        'email_cons',
        'mandatory_tax_id_cons',
        'tax_id_cons',
        'same_as_consignee',
        'name_notify',
        'address_notify',
        'phone_1_notify',
        'phone_2_notify',
        'fax_notify',
        'email_notify',
        'mandatory_tax_id_notify',
        'tax_id_notify',
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
        'gross_weight',
        // 'type_gross',
        // 'net_weight',
        // 'type_net',
        // 'measurement',
        // 'type_measurement',
        'commodity_mbl',
        'hs_code_mbl',
        'mbl_type_bl_id',
        // 'bl_delivery',
        // 'bl_delivery_desc',
        // 'issue_loc',
        'commodity_hbl',
        'hs_code_hbl',
        'hbl_type_bl_id',
        'stuffing_date',
        'stuffing_address',
        'pic_name',
        'pic_phone',
        'top',
        'type_payment_id',
        'remarks',
        'si_doc',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }

    public function undernameMbl()
    {
        return $this->belongsTo(UndernameMbl::class, 'undername_mbl_id', 'id');
    }

    public function undernameHbl()
    {
        return $this->belongsTo(UndernameHbl::class, 'undername_hbl_id', 'id');
    }

    public function containerSizeType()
    {
        return $this->belongsTo(ContainerSizeType::class, 'cont_size_type_id', 'id');
    }

    public function typePack()
    {
        return $this->belongsTo(TypePackaging::class, 'type_packaging_id', 'id');
    }

    public function mandatoryTaxCons()
    {
        return $this->belongsTo(MandatoryTax::class, 'mandatory_tax_id_cons', 'id');
    }

    public function mandatoryTaxNotify()
    {
        return $this->belongsTo(MandatoryTax::class, 'mandatory_tax_id_notify', 'id');
    }

    public function typePayment()
    {
        return $this->belongsTo(TypePayment::class);
    }

    // public function typeWeightGross()
    // {
    //     return $this->belongsTo(TypeWeight::class, 'gross_type_weight_id', 'id');
    // }

    // public function typeWeightNet()
    // {
    //     return $this->belongsTo(TypeWeight::class, 'net_type_weight_id', 'id');
    // }

    // public function typeMeasurement()
    // {
    //     return $this->belongsTo(TypeMeasurement::class);
    // }

    public function typeBillOfLadingMbl()
    {
        return $this->belongsTo(TypeBillOfLading::class, 'mbl_type_bl_id', 'id');
    }

    public function typeBillOfLadingHbl()
    {
        return $this->belongsTo(TypeBillOfLading::class, 'hbl_type_bl_id', 'id');
    }

}
