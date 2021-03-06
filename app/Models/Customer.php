<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'contact_number', 'email', 'address',
        'thana_id', 'district_id', 'country_id',
        'reference', 'status', 'user_id'

    ];


    public function scopeActive($query) {
        return $query->where('status','=', 1);
    }


    public function invoices() {
        return $this->hasMany('App\Models\SalesInvoice');
    }


    public function country() {
        return $this->belongsTo('App\Models\Country')
            ->withDefault();
    }

    public function district() {
        return $this->belongsTo('App\Models\District')
            ->withDefault();
    }

    public function thana() {
        return $this->belongsTo('App\Models\Thana')
            ->withDefault();
    }
    
    public function user() {
        return $this->belongsTo('App\User')
            ->withDefault();
    }

    

}
