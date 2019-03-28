<?php

namespace App\Http\Resources\Manufacturer;

use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
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
            'name' => $this->name,
            'short_name' => $this->short_name,
            'website' => $this->website,
            'country' => $this->country->name,
            'status' => $this->status === 1 ? 'Active' : 'Inactive',
            'created_by' => $this->user->name
        ];
    }
}
