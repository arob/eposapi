<?php

namespace App\Http\Resources\Supplier;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PurchaseInvoice\PurchaseInvoiceResource;

class SupplierResource extends JsonResource {
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
            'contact_person' => $this->contact_person,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'address' => $this->address,
            'thana' => $this->thana,
            'district' => $this->district,
            'country' => $this->country,
            'website' => $this->website,
            'payable' => $this->payable,
            'status' => $this->status,
            'created_by' => $this->user,
            'invoices' => PurchaseInvoiceResource::collection($this->invoices)
        ];
    }
}
