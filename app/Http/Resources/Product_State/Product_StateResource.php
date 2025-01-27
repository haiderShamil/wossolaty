<?php

namespace App\Http\Resources\Product_State;

use Illuminate\Http\Resources\Json\JsonResource;

class Product_StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name
        ];
    }
}
