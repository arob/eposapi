<?php

namespace App\Http\Resources\PurchaseOrder;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PurchaseOrder\PurchaseOrderItemsResource;

class PurchaseOrderWithItemsResource extends JsonResource
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
            'order_number' => $this->order_number,
            'order_date' => $this->order_date,
            'supplier' => $this->supplier->name,
            'status' => $this->status,
            'created_by' => $this->user->name,
            'notes' => $this->notes,
            'items' => PurchaseOrderItemsResource::collection($this->items)
        ];
        
    }
}
