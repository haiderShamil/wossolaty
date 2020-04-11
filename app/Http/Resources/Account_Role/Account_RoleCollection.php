<?php

namespace App\Http\Resources\Account_Role;

use Illuminate\Http\Resources\Json\JsonResource;

class Account_RoleCollection extends JsonResource
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
