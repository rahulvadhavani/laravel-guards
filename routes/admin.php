<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
// IF THE ADMIN USER DON NOT LOGIN CAN ABLE TO SEE THIS ROUTES
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/',            [AdminController::class, 'loginForm'])->name('login.form');
    Route::post('login',   [AdminController::class, 'login'])->name('login');
});
// IF THE ADMIN USER  LOGGEDIN CAN ABLE TO SEE THIS ROUTES
Route::middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('logout',      [AdminController::class, 'logout'])->name('logout');
});
