<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Invoice extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'invoice_type_id','payment_type_id','account_id','product_id','accountname','productname','price','total'
    ];
    public function invoice_types()
    {
        return $this->hasMany(Invoice_Type::class); 
    }
    public function payment_types()
    {
        return $this->hasMany(Payment_Type::class); 
    }
}
