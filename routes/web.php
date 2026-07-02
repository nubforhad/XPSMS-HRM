<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveController;

 

 
 

 
Route::middleware(['auth'])->group(function () {

    Route::resource('company', CompanyController::class);
    Route::resource('branch', BranchController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('employee', EmployeeController::class);

    // Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

    // Route::post('/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.checkin');

    // Route::post('/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.checkout');

        Route::get('/attendance', [AttendanceController::class, 'index'])
        ->name('attendance.index');

    Route::post('/attendance/scan', [AttendanceController::class, 'scanFinger'])
        ->name('attendance.scan');

    Route::get('/attendance/{id}', [AttendanceController::class, 'show'])
        ->name('attendance.show');

    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy'])
        ->name('attendance.destroy');

    // leave type route
    Route::get('/leave-type', [LeaveTypeController::class, 'index'])
        ->name('leave.type.index');

    Route::post('/leave-type/store', [LeaveTypeController::class, 'store'])
        ->name('leave.type.store');

    Route::post('/leave-type/update/{id}', [LeaveTypeController::class, 'update'])
        ->name('leave.type.update');

    Route::get('/leave-type/delete/{id}', [LeaveTypeController::class, 'destroy'])
        ->name('leave.type.delete');
    // leave route 
    Route::resource('/leave', LeaveController::class);
        // ✅ THESE MISSING ROUTES (ADD THIS)
    Route::get('/approve/{id}', [LeaveController::class,'approve'])->name('leave.approve');

    Route::get('/reject/{id}', [LeaveController::class,'reject'])->name('leave.reject');

    Route::get('/delete/{id}', [LeaveController::class,'destroy'])->name('leave.delete');

});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
