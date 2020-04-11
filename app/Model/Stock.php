<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Stock extends Model
{
    //
    use softDeletes;
    protected $fillable = [
      'name','address','description' 
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}