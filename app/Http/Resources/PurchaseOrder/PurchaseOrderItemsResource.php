<?php

namespace App\Http\Resources\PurchaseOrder;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderItemsResource extends JsonResource
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
            'product_code' => $this->product->name_code,
            'product_name' => $this->product->name_name,
            'product_model' => $this->product->name_model,
            'order_rate' => $this->order_rate,
            'order_qty' => $this->order_qty,
            'notes' => $this->notes
        ];
    }
}
