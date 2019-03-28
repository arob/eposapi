<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'status'];

    public $timestamps = false;

    
    public function customers() {
        return $this->hasMany('App\Models\Customer');
    }

    
    public function suppliers() {
        return $this->hasMany('App\Models\Supplier');
    }


}
