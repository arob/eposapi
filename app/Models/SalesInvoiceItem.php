<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesInvoiceItem extends Model
{
    protected $fillable = [
        'product_id', 'product_qty', 'sales_rate', 
        'vat_amount', 'tax_amount', 'discount_amount',
        'notes'
    ];


    public function product() {
        return $this->belongsTo('App\Models\Product')
            ->withDefault();
    }
    
}
