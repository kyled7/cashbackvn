<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'retailers';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'link',
        'cashback_value',
        'cashback_type',
        'clicks',
        'status'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
        'on_update' => true
    ];

    /**
     * A retailer has many deal offers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deals()
    {
        return $this->hasMany('App\Models\Deal');
    }

    /**
     * A retailer belong to many categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'retailer_category', 'retailer_id')->withTimestamps();
    }

    /**
     * build category_list attribute
     * @return mixed
     */
    public function getCategoryListAttribute()
    {
        return $this->categories->lists('id')->toArray();
    }

    public function getRedirectLinkAttribute()
    {
        $user_id = \Auth::user() ? \Auth::user()->id : '1';
        return str_replace('user_id', $user_id, $this->link);
    }
}
