<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $fillable = [
        'installment_number', 'installment_amount', 'due_date'
    ];


    public function invoice() {
        return $this->belongsTo('App\Models\SalesInvoice')
            ->withDefault();
    }
}
