<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = [
        'type',
        'image',
        'link',
        'status',
        'valid_from',
        'expired_at'
    ];
}
