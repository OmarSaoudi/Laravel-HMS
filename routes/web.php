<?php

use App\Http\Controllers\{
    Departments\DepartmentController,
    Specialists\SpecialistController,
    Ambulances\AmbulanceController,
};

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource('departments', DepartmentController::class);
    Route::resource('specialists', SpecialistController::class);
    Route::resource('ambulances', AmbulanceController::class);

});
