<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Account extends Model
{
    //
    use softDeletes;
    protected $fillable = [
        'account_role_id','governate_id','name','sumdept','phone','address','dateadd','note'
    ];
    public function account_roles()
    {
        return $this->hasMany(Account_Role::class); 
    }
    public function governorates()
    {
        return $this->hasMany(Governorate::class); 
    }
}
