<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = ['product_id', 'purchase_rate', 'product_qty'];


    public function invoice() {
        return $this->belongsTo('App\Models\PurchaseInvoice')
            ->withDefault();
    }

}
