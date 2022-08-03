<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    protected $fillable = ['uuid','first_name','last_name','company_id','email','phone','created_at','updated_at'];
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
