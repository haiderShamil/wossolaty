<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Payment_Type extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function invoices2()
    {
        return $this->belongsTo(Invoice::class); 
    }
}
