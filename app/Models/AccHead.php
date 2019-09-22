<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccHead extends Model
{
    protected $fillable = ['name', 'category_id'];

    public $timestamps = false;


    public function category() {
        return $this->belongsTo('App\Models\AccCategory')
            ->withDefault();
    }

    public function ledgers() {
        return $this->hasMany('App\Models\AccLedger');
    }
}
