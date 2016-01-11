<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $table = 'deals';
    protected $fillable = [
        'retailer_id',
        'name',
        'description',
        'type',
        'cashback_value',
        'cashback_type',
        'valid_from',
        'expired_at'
    ];

    /**
     * A deal belong to a retailer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function retailer()
    {
        return $this->belongsTo('App\Models\Retailer');
    }

    /**
     * Get cashback value with cashback type
     * @return string
     */
    public function getCashbackAttribute()
    {
        if ($this->cashback_type == 'percentage') {
            return $this->cashback_value . '%';
        } else {
            return '<span class="currency">' . $this->cashback_value . '</span>';
        }
    }
}
