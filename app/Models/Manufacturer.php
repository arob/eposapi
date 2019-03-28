<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'name', 'short_name', 'website', 'country_id', 'status', 'user_id'
    ];

    
    public function country() {
        return $this->belongsTo('App\Models\Country')
            ->withDefault();
    }
    
    
    public function user() {
        return $this->belongsTo('App\User')
            ->withDefault();
    }


    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}
