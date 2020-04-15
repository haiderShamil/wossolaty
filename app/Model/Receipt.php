<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

/**
 * @OA\Schema(
 *     title="Receipt",
 *     description="Receipt model",
 *     @OA\Xml(
 *         name="Receipt"
 *     )
 * )
 */

class Receipt extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'account_id','name','noreceipt','preaccount','received','postaccount','date'
    ];
    public function accounts()
    {
        return $this->belongsTo(Accounts::class); 
    }
}
