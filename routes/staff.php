<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

// IF THE ADMIN USER DON NOT LOGIN CAN ABLE TO SEE THIS ROUTES
Route::middleware(['guest:staff'])->group(function () {
    Route::get('/',            [StaffController::class, 'loginForm'])->name('login.form');
    Route::post('login',   [StaffController::class, 'login'])->name('login');
});
// IF THE ADMIN USER  LOGGEDIN CAN ABLE TO SEE THIS ROUTES
Route::middleware(['auth:staff'])->group(function () {
    Route::get('dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    Route::post('logout',      [StaffController::class, 'logout'])->name('logout');
});
