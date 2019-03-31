<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
    
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'model' => $this->model,
            'size' => $this->size,
            'uom' => $this->uom->short_name,
            'description' => $this->description,
            'purchase_rate' => $this->purchase_rate,
            'sales_rate' => $this->sales_rate,
            'vat_pct' => $this->vat_pct,
            'tax_pct' => $this->tax_pct,
            'discount_pct' => $this->discount_pct,
            'stock_qty' => $this->stock_qty,
            'reorder_level' => $this->reorder_level,
            'warranty_period' => $this->warranty_period,
            'supplier' => $this->supplier->name,
            'manufacturer' => $this->manufacturer->name,
            'origin' => $this->country->name,
            'status' => $this->status,
            'created_by' => $this->user->name
        ];

    }
}
