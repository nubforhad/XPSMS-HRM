<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'phone',
        'email',
        'address',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function designations()
    {
        return $this->hasMany(Designation::class);
    }


    
}