<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Cash_Detail",
 *     description="Cash_Detail model",
 *     @OA\Xml(
 *         name="Cash_Detail"
 *     )
 * )
 */

class Cash_Detail extends Model
{
    //
    use softDeletes;
    protected $fillable =[
        'cash_type_id','name','amount','date'
    ];
    public function cash_types()
    {
        return $this->hasMany(Cash_Type::class); 
    }
}
