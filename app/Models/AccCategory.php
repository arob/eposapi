<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccCategory extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;


    public function heads() {
        return $this->hasMany('App\Models\AccHeads');
    }

}
