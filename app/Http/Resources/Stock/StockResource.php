<?php

namespace App\Http\Resources\Stock;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
            'name'=> $this->name,
            'address'=>$this->address,
            'description'=>$this->description,
            // 'number of product' => $this->products->count() > 0 ? $this->products->count() : 'Empty',
            // 'href' => [
            //     'products' => route('products.indexStore',$this->id)
            // ]
        ];
    }
}
