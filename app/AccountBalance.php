<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
    protected $table = 'account_balance';
    protected $fillable = [
        'user_id',
        'amount'
    ];
}
