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
}