<?php

use App\Http\Controllers\Membership\MembershipPlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\StaffManagementController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Member\ProfileController as MemberProfileController;
use App\Http\Controllers\Member\ClassBookingController;
use App\Http\Controllers\Member\AttendanceController;
use App\Http\Controllers\Member\TrainingSessionController;  // Updated namespace
use App\Http\Controllers\Training\TrainerController;
use App\Http\Controllers\Membership\MembershipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Membership Routes
    Route::prefix('membership')->name('membership.')->group(function () {
        Route::get('/plans', [MembershipController::class, 'plans'])->name('plans');
        Route::get('/subscriptions', [MembershipController::class, 'subscriptions'])->name('subscriptions');
        Route::post('/subscribe/{planId}', [MembershipController::class, 'subscribe'])->name('subscribe');
    });

    // Member Routes
    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/profile', [MemberProfileController::class, 'show'])->name('profile');
        Route::put('/profile', [MemberProfileController::class, 'update'])->name('profile.update');
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
        
        // Class Booking
        Route::get('/classes', [ClassBookingController::class, 'index'])->name('classes');
        Route::post('/classes/{class}/book', [ClassBookingController::class, 'book'])->name('classes.book');
        Route::delete('/classes/{class}/cancel', [ClassBookingController::class, 'cancel'])->name('classes.cancel');
        
        // Attendance
        Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.check-in');
        Route::post('/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.check-out');
        
        // Training Sessions - Updated to use the correct namespace
        Route::get('/training-sessions', [TrainingSessionController::class, 'index'])->name('training.sessions');
        Route::post('/training-sessions/{session}/book', [TrainingSessionController::class, 'book'])->name('training.book');
        Route::delete('/training-sessions/{session}/cancel', [TrainingSessionController::class, 'cancel'])->name('training.cancel');
    });

    // Trainer Routes
    Route::prefix('trainer')->name('trainer.')->middleware('trainer.access')->group(function () {
        Route::get('/schedule', [TrainerController::class, 'schedule'])->name('schedule');
        Route::post('/sessions', [TrainerController::class, 'createSession'])->name('sessions.create');
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // User Management
    Route::resource('users', UserManagementController::class);
    Route::post('users/{user}/toggle-status', [UserManagementController::class, 'toggleStatus'])->name('users.toggle-status');
    
    // Staff Management
    Route::resource('staff', StaffManagementController::class);
    Route::post('staff/{staff}/toggle-status', [StaffManagementController::class, 'toggleStatus'])->name('staff.toggle-status');
    
    // Equipment Management
    Route::resource('equipment', EquipmentController::class);
    Route::post('equipment/{equipment}/maintenance', [EquipmentController::class, 'maintenance'])->name('equipment.maintenance');
    
    // Facility Management
    Route::resource('facilities', FacilityController::class);
    Route::post('facilities/{facility}/toggle-status', [FacilityController::class, 'toggleStatus'])->name('facilities.toggle-status');
});

require __DIR__.'/auth.php';

