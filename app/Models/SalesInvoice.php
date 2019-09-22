<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    protected $fillable = [
        'sales_type', 'invoice_number', 'invoice_date',
        'customer_id', 'invoice_total', 'paid_amount',
        'user_id', 'notes'
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
        return $this->hasMany('App\Models\SalesItem');
    }


    public function installments() {
        return $this->hasMany('App\Models\Installment');
    }
}
