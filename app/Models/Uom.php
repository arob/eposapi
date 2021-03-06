<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    protected $fillable = [
        'name', 'short_name'
    ];


    public function products() {
        return $this->hasMany('App\Models\Product');
    }
    
    
    public $timestamps = false;
}
