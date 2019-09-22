<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'name', 'model', 'size', 'uom_id', 'description',
        'sales_rate', 'vat_pct', 'tax_pct','discount_pct', 
        'reorder_level', 'warranty_period', 'capacity',
        'capacity_unit_id','manufacturer_id',
        'country_id', 'status', 'user_id'
    ];

    public function scopeInStock($query) {
        return $query->where('stock_qty', '>', 0);
    }


    public function scopeActive($query) {
        return $query->where('status', '=', 1);
    }
    

    
    public function uom() {
        return $this->belongsTo('App\Models\Uom')
            ->withDefault();
    }


    public function capacityUnit() {
        return $this->belongsTo('App\Models\CapacityUnit')
            ->withDefault();
    }


    public function country() {
        return $this->belongsTo('App\Models\Country')
            ->withDefault();
    }
    
    
    public function manufacturer() {
        return $this->belongsTo('App\Models\Manufacturer')
            ->withDefault();
    }


    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }


    public function user() {
        return $this->belongsTo('App\User')
            ->withDefault();
    }    
}
