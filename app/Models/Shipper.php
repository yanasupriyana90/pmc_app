<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Shipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_shipper',
        'name',
        'address',
        'phone_1',
        'phone_2',
        'fax',
        'email',
        'npwp',
        'user_id',
    ];

    /**
     * Get the user that owns the Shipper
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
