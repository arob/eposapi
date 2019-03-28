<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [
        'name', 'short_name', 'status'
    ];

    public function products() {
        return $this->hasMany('App\Models\Product');
    }
    

    public function manufacturers() {
        return $this->hasMany('App\Models\Manufacturer');
    }


    public function suppliers() {
        return $this->hasMany('App\Models\Supplier');
    }
    

    public function customers() {
        return $this->hasMany('App\Models\Customer');
    }
   

    public $timestamps = false;
}
