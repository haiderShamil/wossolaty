<?php

namespace App\Http\Resources\Invoice_Type;

use Illuminate\Http\Resources\Json\JsonResource;

class Invoice_TypeResource extends JsonResource
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
        'id' =>$this->id,
        'name' => $this->name
       ];
    }
}
