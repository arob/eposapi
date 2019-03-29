<?php

namespace App\Http\Resources\SalesInvoice;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SalesInvoice\SalesItemsResource;

class SalesInvoiceWithItemsResource extends JsonResource
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
            'invoice_type' => $this->invoice_type,
            'invoice_number' => $this->invoice_number,
            'invoice_date' => $this->invoice_date,
            'customer' => $this->customer->name,
            'created_by' => $this->user->name,
            'notes' => $this->notes,
            'items' => SalesItemsResource::collection($this->items)
        ];
    }
}
