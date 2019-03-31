<?php

namespace App\Http\Resources\Uom;

use Illuminate\Http\Resources\Json\JsonResource;

class UomResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'name' => $this->name,
            'short_name' => $this->short_name
        ];
        
    }
}
