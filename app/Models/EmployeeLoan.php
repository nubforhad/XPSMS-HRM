<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeLoan extends Model
{
    protected $fillable = [
        'employee_id',
        'loan_category_id',
        'loan_amount',
        'installment_count',
        'per_installment',
        'approved_date',
        'status',
        'reason',
    ];

    // 🔗 Relationship (future use)
    public function category()
    {
        return $this->belongsTo(LoanCategory::class, 'loan_category_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}