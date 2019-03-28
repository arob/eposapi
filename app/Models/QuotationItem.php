<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    protected $fillable = [
        'product_id', 'product_qty', 
        'quotation_rate', 'quotation_id',
        'notes'
    ];

    
    public function quotation() {
        return $this->belongsTo('App\Models\Quotation');
    }

    
    public function product() {
        return $this->belongsTo('App\Models\Product');
    }


}
