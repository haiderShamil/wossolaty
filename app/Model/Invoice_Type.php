<?php
/**
 * @OA\Tag(
 *     name="Invoice_Type",
 *     description="Sample APIs Everything about your Invoice_Type ",
 * )
**/
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

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
