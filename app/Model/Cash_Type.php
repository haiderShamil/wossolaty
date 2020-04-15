<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Cash_Type",
 *     description="Cash_Type model",
 *     @OA\Xml(
 *         name="Cash_Type"
 *     )
 * )
 */

class Cash_Type extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function cash_details()
    {
        return $this->belongsTo(Cash_Detail::class); 
    }
}
