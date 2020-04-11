<?php

namespace App\Http\Resources\Cash_Detail;

use Illuminate\Http\Resources\Json\JsonResource;

class Cash_DetailCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
