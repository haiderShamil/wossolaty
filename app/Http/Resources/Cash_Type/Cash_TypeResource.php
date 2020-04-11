<?php

namespace App\Http\Resources\Cash_Type;

use Illuminate\Http\Resources\Json\JsonResource;

class Cash_TypeResource extends JsonResource
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
            'id' =>$this->id,
            'name' => $this->name
        ];
    }
}
