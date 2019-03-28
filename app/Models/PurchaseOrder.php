<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
  protected $fillable = [
    'order_number', 'order_date', 'supplier_id', 
    'status', 'notes'
  ];


  public function supplier() {
    return $this->belongsTo('App\Models\Supplier');
  }


  public function purchaseOrderItems() {
    return $this->hasMany('App\Models\PurchaseOrderItem');
  }
  
}
