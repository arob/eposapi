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
            'capacity' => $this->capacity,
            'capacity_unit_id' => $this->capacity_unit_id,
            'uom' => $this->uom,
            'description' => $this->description,
            'sales_rate' => $this->sales_rate,
            'vat_pct' => $this->vat_pct,
            'tax_pct' => $this->tax_pct,
            'discount_pct' => $this->discount_pct,
            'stock_qty' => $this->stock_qty,
            'reorder_level' => $this->reorder_level,
            'warranty_period' => $this->warranty_period,
            'manufacturer' => $this->manufacturer,
            'origin' => $this->country,
            'status' => $this->status,
            'created_by' => $this->user->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

    }
}
