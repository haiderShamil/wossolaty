<?php

namespace App\Http\Resources\Product_State;

use Illuminate\Http\Resources\Json\JsonResource;

class Product_StateCollection extends JsonResource
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
