<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'fa_icon'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
        'on_update' => true
    ];

    /**
     * Category has many retailer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function retailers()
    {
        return $this->belongsToMany('App\Retailer', 'retailer_category', 'category_id')->withTimestamps();
    }
}
