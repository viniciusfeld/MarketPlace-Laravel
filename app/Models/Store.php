<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Store extends Model
{
    
    use HasFactory;
    use HasSlug;
    protected $fillable = ['user_id', 'name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
                            ->generateSlugsFrom('name')
                            ->saveSlugsTo('slug');
    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function products()
    {

        return $this->hasMany(Product::class);
    }


    public function orders(){

        return $this->belongsToMany(UserOrder::class);
    }

}
