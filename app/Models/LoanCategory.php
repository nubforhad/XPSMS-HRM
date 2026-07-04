<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanCategory extends Model
{
    protected $fillable = [
        'name',
        'max_amount',
        'max_installment',
        'interest_rate',
        'status',
    ];
}