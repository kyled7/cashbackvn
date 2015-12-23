<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'user_id',
        'retailer_id',
        'order_price',
        'cashback_amount',
        'status'
    ];

    public function retailer()
    {
        return $this->belongsTo('App\Retailer');
    }

    public function getRetailerNameAttribute()
    {
        return $this->retailer->name;
    }
}
