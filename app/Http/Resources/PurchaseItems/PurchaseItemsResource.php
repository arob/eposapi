<?php

namespace App\Http\Resources\PurchaseItems;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseItemsResource extends JsonResource
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
            'product' => stripslashes($this->product->name),
            'purchase_rate' => $this->purchase_rate,
            'product_qty' => $this->product_qty,
            'subtotal' => $this->purchase_rate * $this->product_qty
        ];
    }
}
