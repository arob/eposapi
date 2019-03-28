<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    protected $fillable = [
        'invoice_number', 'invoice_date', 
        'supplier_id', 'user_id', 'notes' 
    ];
    

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier')
            ->withDefault();
    }


    public function user() {
        return $this->belongsTo('App\User')
            ->withDefault();
    }

    public function items() {
        return $this->hasMany('App\Models\PurchaseItem');
    }




}
