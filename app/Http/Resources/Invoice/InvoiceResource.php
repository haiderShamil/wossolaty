<?php

namespace App\Http\Resources\Invoice;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'id'=>$this->id,
            'invoice_type_id'=> $this->invoice_type_id,
            'payment_type_id'=> $this->payment_type_id,
            'account_id'=>$this->account_id,
            'product_id'=>$this->product_id,
            'accountname'=> $this->accountname,
            'productname'=> $this->productname,
            'price'=> $this->price,
            'amount'=> $this->amount,
            'total'=> ($this->price * $this->amount),
            'no'=> $this->no,

        ];
    }
}
