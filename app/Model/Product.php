<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name','unit_price','pur_price','model','description','expire','production','qty','unitinstock','min_qty','max_qty','stock_id','product_states_id'
    ];
    public function states()
    {
        return $this->hasMany(Product_State::class); 
    }
    public function stocks()
    {
        return $this->belongsTo(Stock::class); 
    }
}
