<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    protected $fillable = [
        'name', 'short_name'
    ];

    public $timestamps = false;
}
