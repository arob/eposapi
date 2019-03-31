<?php

namespace App\Http\Resources\Thana;

use Illuminate\Http\Resources\Json\JsonResource;

class ThanaResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status
        ];
        
    }
}
