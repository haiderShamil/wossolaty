<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'id' => $this->id,
            'account_role_id' => $this->account_role_id,
            'governate_id' => $this->governate_id,
            'name' => $this->name,
            'idsumdept' => $this->sumdept,
            'phone' => $this->phone,
            'address' => $this->address,
            'dateadd' => $this->dateadd,
            'note' => $this->note,

                ];
    }
}
