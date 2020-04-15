<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Governorate",
 *     description="Governorate model",
 *     @OA\Xml(
 *         name="Governorate"
 *     )
 * )
 */

class Governorate extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function accounts2()
    {
        return $this->belongsTo(Account::class); 
    }
}
