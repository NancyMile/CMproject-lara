<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Company extends Model
{
    protected $fillable = ['uuid','name', 'email', 'logo','website','created_at','updated_at'];
    protected $guarded = [];
    public $timestamps =true;
    protected $table = 'companies';

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
