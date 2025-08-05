<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
    'name',
    'email',
    'phone',
    'position',
    'company_id',
    'manager_name',
    'country',
    'state',
    'city',
];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function manager()
    {
    return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function subordinates()
    {
    return $this->hasMany(Employee::class, 'manager_id');
    }
}
