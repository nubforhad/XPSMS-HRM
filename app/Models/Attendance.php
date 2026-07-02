<?php

 namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'in_time',
        'out_time',
        'working_hours',
        'late_minutes',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
} 