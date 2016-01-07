<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountBalanceHistory extends Model
{
    protected $table = 'account_balance_history';
    protected $fillable = [
        'account_balance_id',
        'amount_change',
        'description'
    ];
}
