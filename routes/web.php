<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin User
Route::prefix('admin')->name('admin.')
    ->middleware('web')
    ->namespace('admin')
    ->group(base_path('routes/admin.php'));
// Staff User
Route::prefix('staff')->name('staff.')
    ->middleware('web')
    ->namespace('admin')
    ->group(base_path('routes/staff.php'));
