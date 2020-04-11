<?php

namespace App\Http\Resources\Receipt;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceiptResource extends JsonResource
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
            'account_id' => $this->account_id,
            'name' => $this->name,
            'noreceipt' => $this->noreceipt,
            'preaccount' => $this->preaccount,
            'received' => $this->received,
            'postaccount' => $this->postaccount,
            'date' => $this->date
        ];
    }
}
