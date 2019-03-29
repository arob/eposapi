<?php

namespace App\Http\Resources\SalesInvoice;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'product' => $this->product->name,
            'sales_rate' => $this->sales_rate,
            'product_qty' => $this->product_qty,
            'vat_amount' => $this->vat_amount,
            'tax_amount' => $this->tax_amount,
            'discount_amount' => $this->discount_amount,
            
            'subtotal' => ($this->sales_rate * $this->product_qty) 
                + $this->vat_amount + $this->tax_amount - $this->discount_amount,
            
                'sales_invoice_id' => $this->sales_invoice_id
        ];
    }
}
