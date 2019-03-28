<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'quotation_number', 'quotation_date', 
        'validity_period', 'customer_id'
    ];


    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }
    
    
    public function quotation_items() {
        return $this->hasMany('App\Models\QuotationItem');
    }
    
}
