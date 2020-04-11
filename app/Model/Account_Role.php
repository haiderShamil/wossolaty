<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Account_Role extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'name'
    ];
    public function accounts1()
    {
        return $this->belongsTo(Account::class); 
    }
}
