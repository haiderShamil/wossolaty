<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

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
