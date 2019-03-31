<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'name', 'model', 'size', 'uom_id', 'description',
        'sales_rate', 'vat_pct', 'tax_pct',
        'discount_pct', 'stock_qty', 'reorder_level', 
        'warranty_period', 'supplier_id',
        'manufacturer_id', 'country_id',
        'status', 'user_id'
    ];

    
    
    public function uom() {
        return $this->belongsTo('App\Models\Uom')
            ->withDefault();
    }


    public function sizeUnit() {
        return $this->belongsTo('App\Models\SizeUnit')
            ->withDefault();
    }


    public function country() {
        return $this->belongsTo('App\Models\Country')
            ->withDefault();
    }
    
    
    public function supplier() {
        return $this->belongsTo('App\Models\Supplier')
            ->withDefault();
    }

    
    public function manufacturer() {
        return $this->belongsTo('App\Models\Manufacturer')
            ->withDefault();
    }


    public function tags() {
        return $this->belongsToMany('App\Models\Tag')
            ->withDefault();
    }

    // public function purchase_order_items() {
    //     return $this->hasMany('App\Models\PurchaseOrderItem');
    // }
    
    
    // public function sales_order_items() {
    //     return $this->hasMany('App\Models\PurchaseOrderItem');
    // }

    
}
