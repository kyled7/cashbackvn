<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeemRequest extends Model
{
    protected $table = 'redeem_requests';
    protected $fillable = [
        'user_id',
        'requested_amount',
        'paid_amount',
        'status'
    ];
}
