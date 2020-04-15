<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Product_State",
 *     description="Product_State model",
 *     @OA\Xml(
 *         name="Product_State"
 *     )
 * )
 */

class Product_State extends Model
{
    use softDeletes;

    //
    protected $fillable = [
        'name'
    ];
    public function products1()
    {
        return $this->belongsTo(Product::class); 
    }
}
