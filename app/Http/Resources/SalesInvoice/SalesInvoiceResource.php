<?php

namespace App\Http\Resources\SalesInvoice;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesInvoiceResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'id' => $this->id,
            'sales_type' => $this->sales_type,
            'invoice_number' => $this->invoice_number,
            'invoice_date' => $this->invoice_date,
            'customer' => $this->customer->name,
            'invoice_total' => $this->invoice_total,
            'paid_amount' => $this->paid_amount,
            'due_amount' => $this->invoice_total - $this->paid_amount,
            'customer' => $this->customer->name,
            'created_by' => $this->user->name,
            'notes' => $this->notes,
            'links' => [
                'self' => route('sales-invoices.show', $this->id)
            ]
        ];
    }
}
