<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Cash_Type extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function cash_details()
    {
        return $this->belongsTo(Cash_Detail::class); 
    }
}
