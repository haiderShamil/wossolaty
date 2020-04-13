<?php
/**
 * @OA\Tag(
 *     name="Cash_Detail",
 *     description="Sample APIs Everything about your Cash_Detail ",
 * )
**/
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

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
