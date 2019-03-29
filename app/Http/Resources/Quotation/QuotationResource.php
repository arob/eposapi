<?php

namespace App\Http\Resources\Quotation;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotationResource extends JsonResource
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
            'quotation_number' => $this->quotation_number,
            'validity_period' => $this->validity_period,
            'customer_id' => $this->customer->name,
            'created_by' => $this->user->name,
            'notes' => $this->notes,
            'links' => [
                'self' => route('quotations.show', $this->id)
            ]
        ];
    }
}
