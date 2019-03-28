<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    protected $fillable = [
        'product_id', 'order_rate', 'order_qty', 'notes'
    ];



    public function purchaseOrder() {
        return $this->belongsTo('App\Models\PurchaseOrder');
    }


    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
