<?php

namespace App;

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

    public function retailer()
    {
        return $this->belongsTo('App\Retailer');
    }
}