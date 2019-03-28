<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
        'product_id', 'purchase_rate', 'product_qty', 'notes'
    ];


    public function product() {
        return $this->belongsTo('App\Models\Product')
            ->withDefault();
    }


    public function invoice() {
        return $this->belongsTo('App\Models\PurchaseInvoice')
            ->withDefault();
    }


}
