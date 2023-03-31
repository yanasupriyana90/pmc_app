<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PettyCash extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_trans',
        'date_trans',
        'desc',
        'debit',
        'credit',
        'bank_account_id',
        'trans_doc',
        'remarks',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(bankAccount::class, 'bank_account_id', 'id');
    }
}
