<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SalesInvoice\SalesInvoiceResource;

class CustomerResource extends JsonResource {
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
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'address' => $this->address,
            'thana' => $this->thana,
            'district' => $this->district,
            'country' => $this->country,
            'reference' => $this->reference,
            'created_by' => $this->user,
            'status' => $this->status,
            'since' => $this->created_at->format('M d Y H:i:s'),
            // 'invoices' => SalesInvoiceResource::collection($this->invoices)
        ];
    }
}
