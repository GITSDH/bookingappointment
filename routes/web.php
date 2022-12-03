<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('subscriptions', SubscriptionController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('hospitals', HospitalController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('specialities', SpecialityController::class);
    Route::get('/appoinments', function ()
    {
        return view('appoinments.index');
    })->name('appoinments.index');

});
require __DIR__.'/auth.php';