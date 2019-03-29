<?php

namespace App\Http\Resources\PurchaseOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderResource extends JsonResource
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
            'order_date' => $this->order_date,
            'supplier' => $this->supplier->name,
            'status' => $this->status,
            'created_by' => $this->user->name,
            'notes' => $this->notes,
            'links' => [
                'self' => route('purchase-orders.show', $this->id)
            ]
        ];
    }
}
