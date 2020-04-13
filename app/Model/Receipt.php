<?php
/**
 * @OA\Tag(
 *     name="Receipt",
 *     description="Sample APIs Everything about your Receipt ",
 * )
**/
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

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
