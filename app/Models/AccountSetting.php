<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountSetting extends Model
{
    protected $table = 'account_setting';
    protected $fillable = [
        'user_id',
        'bank_name',
        'bank_branch',
        'account_number',
        'account_name'
    ];
}
