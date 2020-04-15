<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Invoice_Type",
 *     description="Invoice_Type model",
 *     @OA\Xml(
 *         name="Invoice_Type"
 *     )
 * )
 */


class Invoice_Type extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function invoices1()
    {
        return $this->belongsTo(Invoice::class); 
    }
}
