<?php

namespace App\Http\Resources\Manufacturer;

use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource {
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
            'short_name' => $this->short_name,
            'website' => $this->website,
            'country_id' => $this->country_id,
            'country' => $this->country->name,
            'status' => $this->status,
            'user_id' => $this->user->id,
            'user_name' => $this->user->name
        ];
    }
}
