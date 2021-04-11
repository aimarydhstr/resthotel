<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BookingController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/booking/{any}', [HomeController::class, 'create'])->name('home.booking');
Route::post('/book/{id}', [HomeController::class, 'store'])->name('home.store')->middleware(['auth', 'cekrole:user']);
Route::get('/detail', [HomeController::class, 'detail'])->name('home.detail')->middleware(['auth', 'cekrole:user']);
Route::get('/myroom', [HomeController::class, 'myroom'])->name('home.myroom')->middleware(['auth', 'cekrole:user']);
Route::get('/pay/{id}', [HomeController::class, 'pay'])->name('home.pay')->middleware(['auth', 'cekrole:user']);
Route::get('/delete/{id}', [HomeController::class, 'destroy'])->name('home.delete')->middleware(['auth', 'cekrole:user']);

Auth::routes();

// Admin Page
Route::prefix('/admin')->middleware(['auth', 'cekrole:admin'])->group(function(){
	// Dashboard
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
	// Room
	Route::get('/room', [RoomController::class, 'index'])->name('room');
	Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
	Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');
	Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
	Route::put('/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
	Route::get('/room/delete/{id}', [RoomController::class, 'destroy'])->name('room.delete');
	// Facility
	Route::get('/facility', [FacilityController::class, 'index'])->name('facility');
	Route::get('/facility/create', [FacilityController::class, 'create'])->name('facility.create');
	Route::post('/facility/store', [FacilityController::class, 'store'])->name('facility.store');
	Route::get('/facility/edit/{id}', [FacilityController::class, 'edit'])->name('facility.edit');
	Route::put('/facility/update/{id}', [FacilityController::class, 'update'])->name('facility.update');
	Route::get('/facility/delete/{id}', [FacilityController::class, 'destroy'])->name('facility.delete');
	// Booking
	Route::get('/booking', [BookingController::class, 'index'])->name('booking');
	Route::get('/booking/delete/{id}', [BookingController::class, 'destroy'])->name('booking.delete');
});
