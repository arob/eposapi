<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
  protected $fillable = [
    'order_number', 'order_date', 'supplier_id', 
    'status', 'user_id', 'notes'
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
    return $this->hasMany('App\Models\PurchaseOrderItem');
  }
  
}
