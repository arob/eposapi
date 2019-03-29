<?php

namespace App\Http\Resources\Quotation;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotationItemsResource extends JsonResource
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
            'product_qty' => $this->product_qty,
            'quotation_rate' => $this->quotation_rate
        ];
    }
}
