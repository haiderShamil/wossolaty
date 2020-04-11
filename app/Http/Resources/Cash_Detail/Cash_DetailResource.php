<?php

namespace App\Http\Resources\Cash_Detail;

use Illuminate\Http\Resources\Json\JsonResource;

class Cash_DetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        [
            'id' => $this->id,
            'cash_type_id' => $this->cash_type_id,
            'name' => $this->name,
            'amount' => $this->amount,
            'date' => $this->date
 
         ];
    }
}
