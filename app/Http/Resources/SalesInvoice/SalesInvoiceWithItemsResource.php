<?php

namespace App\Http\Resources\SalesInvoice;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Customer\CustomerResource;
use App\Http\Resources\SalesInvoice\SalesItemsResource;

class SalesInvoiceWithItemsResource extends JsonResource {
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
            'invoice_total' => $this->invoice_total,
            'paid_amount' => $this->paid_amount,
            'due_amount' => $this->invoice_total - $this->paid_amount,
            // 'customer' => $this->customer,
            'customer' => new CustomerResource($this->customer),
            'created_by' => $this->user->name,
            'notes' => $this->notes,
            'items' => SalesItemsResource::collection($this->items),
            'installments' => $this->installments

        ];
    }
}
