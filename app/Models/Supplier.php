<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'contact_person', 
        'contact_number', 'email', 'address', 
        'thana_id', 'district_id', 'country_id', 
        'website', 'status', 'user_id'
    ];


    public function products() {
        return $this->hasMany('App\Models\Product');
    }

    
    public function thana() {
        return $this->belongsTo('App\Models\Thana')
        ->withDefault();
    }
    
    
    public function district() {
        return $this->belongsTo('App\Models\District')
        ->withDefault();
    }
    
    
    public function country() {
        return $this->belongsTo('App\Models\Country')
            ->withDefault();
    }
    
    public function user() {
        return $this->belongsTo('App\User')
            ->withDefault();
    }
}
