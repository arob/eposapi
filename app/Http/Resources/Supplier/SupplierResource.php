<?php

namespace App\Http\Resources\Supplier;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return [
            'name' => $this->name,
            'contact_person' => $this->contact_person,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'address' => $this->address,
            'thana' => $this->thana->name,
            'district' => $this->district->name,
            'country' => $this->country->name,
            'country_short_name' => $this->country->short_name,
            'website' => $this->website,
            'status' => $this->status === 1 ? 'Active' : 'Inactive',
            'created_by' => $this->user->name
        ];
    }
}
