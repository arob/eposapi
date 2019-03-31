<?php

namespace App\Http\Resources\PurchaseInvoice;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PurchaseInvoice\PurchaseItemsResource;

class PurchaseInvoiceWithItemsResource extends JsonResource {
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
            'supplier' => $this->supplier->name,
            'created_by' => $this->user->name,
            'notes' => $this->notes,
            'items' => PurchaseItemsResource::collection($this->items),
        ];
        
    }
}
