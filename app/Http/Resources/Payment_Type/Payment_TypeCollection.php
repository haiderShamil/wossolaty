<?php

namespace App\Http\Resources\Payment_Type;

use Illuminate\Http\Resources\Json\JsonResource;

class Payment_TypeCollection extends JsonResource
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
