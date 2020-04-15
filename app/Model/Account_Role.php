<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Account_Role",
 *     description="Account_Role model",
 *     @OA\Xml(
 *         name="Account_Role"
 *     )
 * )
 */

class Account_Role extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function accounts1()
    {
        return $this->belongsTo(Account::class); 
    }
}
