<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'quotation_number', 'quotation_date', 
        'validity_period', 'customer_id', 'user_id',
        'notes'
    ];


    public function customer() {
        return $this->belongsTo('App\Models\Customer')
            ->withDefault();
    }
    
    
    public function user() {
        return $this->belongsTo('App\User')
            ->withDefault();
    }
    
    
    public function items() {
        return $this->hasMany('App\Models\QuotationItem');
    }
    
}
