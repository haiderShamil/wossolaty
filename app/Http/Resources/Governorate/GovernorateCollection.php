<?php

namespace App\Http\Resources\Governorate;

use Illuminate\Http\Resources\Json\JsonResource;

class GovernorateCollection extends JsonResource
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
