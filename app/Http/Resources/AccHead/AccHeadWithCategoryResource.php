<?php

namespace App\Http\Resources\AccHead;

use Illuminate\Http\Resources\Json\JsonResource;

class AccHeadWithCategoryResource extends JsonResource
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
            'name' => $this->name,
            'category_name' => $this->category->name,
            'category_id' => $this->category_id,
        ];

    }
}
