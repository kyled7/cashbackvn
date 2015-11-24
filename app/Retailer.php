<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    protected $table = 'retailers';
    protected $fillable = [
        'name',
        'description',
        'logo',
        'link',
        'cashback_value',
        'cashback_type',
        'clicks',
        'status'
    ];
}
