<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' =>$this->name,
            'unit_price' =>$this->unit_price,
            'pur_price' =>$this->pur_price, 
            'model' =>$this->model,
            'description' =>$this->description,
            'expire' =>$this->expire,
            'production' =>$this->production,
            'qty' =>$this->qty,
            'unitinstock' =>$this->unitinstock,
            'min_qty' =>$this->min_qty,
            'max_qty' =>$this->max_qty,
            'stock_id' =>$this->stock_id,
        ];
    }
}
