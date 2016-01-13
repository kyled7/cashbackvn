<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
    protected $table = 'account_balance';
    protected $fillable = [
        'user_id',
        'amount'
    ];

    /**
     * Account balance has many history records
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany('App\Models\AccountBalanceHistory');
    }
}
