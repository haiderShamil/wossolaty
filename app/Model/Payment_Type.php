<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Payment_Type",
 *     description="Payment_Type model",
 *     @OA\Xml(
 *         name="Payment_Type"
 *     )
 * )
 */

class Payment_Type extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function invoices2()
    {
        return $this->belongsTo(Invoice::class); 
    }
}
