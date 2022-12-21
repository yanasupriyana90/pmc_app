<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyParty extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_notify_party',
        'name',
        'address',
        'phone_1',
        'phone_2',
        'fax',
        'email',
        'mandatory_tax_id',
        'tax_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function mandatoryTax()
    {
        return $this->belongsTo(MandatoryTax::class);
    }
}
