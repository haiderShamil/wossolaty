<?php
/**
 * @OA\Tag(
 *     name="Governorate",
 *     description="Sample APIs Everything about your Governorate ",
 * )
**/
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
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
