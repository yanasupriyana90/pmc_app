<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SellingBuying extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_sheet_head_id',
        'exchange_rate',
        'user_id'
    ];

    /**
     * Get the user that owns the SellingBuying
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the SellingBuying
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jobSheetHead(): BelongsTo
    {
        return $this->belongsTo(JobSheet::class, 'job_sheet_head_id', 'id');
    }
}
