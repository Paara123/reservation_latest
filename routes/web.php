<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationDetailController;
use App\Http\Controllers\ResourcePersonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationStatusController;
use App\Http\Controllers\ResourcePersonRegisterController;
use App\Http\Controllers\UserReservationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/reservation/create', [ReservationDetailController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/store', [ReservationDetailController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/edit', [ReservationDetailController::class, 'edit'])->name('reservation.edit');
    Route::put('/reservation/update', [ReservationDetailController::class, 'update'])->name('reservation.update');
    Route::get('/reservation/{id}/edit', [ReservationDetailController::class, 'edit'])->name('reservation.edit');
    Route::post('/reservation/store-in-database', [ReservationDetailController::class, 'storeInDatabase'])->name('reservation.storeInDatabase');
    Route::get('/reservations/{id}/edit', [ReservationDetailController::class, 'edit'])->name('reservation.edit')->middleware('auth');
    Route::put('/reservations/{id}', [ReservationDetailController::class, 'update'])->name('reservation.update')->middleware('auth');
    Route::delete('/reservations/{id}', [ReservationDetailController::class, 'destroy'])->name('reservation.destroy')->middleware('auth');
    Route::get('/reservation/{id}', [ReservationDetailController::class, 'show'])->name('reservation.show');
    Route::get('/user/reservations', [UserReservationController::class, 'index'])->name('user.reservations');

});

Route::get('/reservations', [ReservationDetailController::class, 'index'])->name('reservation.index')->middleware('auth');
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
    Route::resource('resource-person', ResourcePersonController::class);
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.user.update');
   // web.php
    Route::get('/admin/reservations', [ReservationStatusController::class, 'index'])->name('reservation.status.index');
    Route::put('/admin/reservations/{id}/update', [ReservationStatusController::class, 'update'])->name('reservation.status.update');
    Route::get('/admin/register-resource-person', [ResourcePersonRegisterController::class, 'create'])->name('resource-person.register.create');
    Route::post('/admin/register-resource-person', [ResourcePersonRegisterController::class, 'store'])->name('resource-person.register.store');
});
/*------------------------------------------
----------------S----------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});