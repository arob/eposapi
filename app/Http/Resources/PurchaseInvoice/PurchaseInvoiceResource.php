<?php

namespace App\Http\Resources\PurchaseInvoice;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseInvoiceResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'id' => $this->id,
            'invoice_number' => $this->invoice_number,
            'invoice_date' => $this->invoice_date,
            'supplier_name' => $this->supplier->name,
            'invoice_total' => $this->invoice_total,
            'paid_amount' => $this->paid_amount,
            'due_amount' => $this->invoice_total - $this->paid_amount,
            'user' => $this->user->name,
            'notes' => $this->notes,
            // 'links' => [
            //     'self' => route('purchase-invoices.show', $this->id)
            // ]
        ];
    }
}
