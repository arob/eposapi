<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $fillable = ['name', 'status'];


    public function customers() {
        return $this->hasMany('App\Models\Customer');
    }

    
    public function suppliers() {
        return $this->hasMany('App\Models\Supplier');
    }
    
    
    public $timestamps = false;
}
