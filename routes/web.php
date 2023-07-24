<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\RestoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/motor', [MotorController::class, 'index'])->name('motor.index');
Route::get('/motor/create', [MotorController::class, 'create'])->name('motor.create');
Route::post('/motor', [MotorController::class, 'store'])->name('motor.store');
Route::get('/motor/{id}', [MotorController::class, 'show'])->name('motor.show');
Route::get('/motor/edit/{id}', [MotorController::class, 'edit'])->name('motor.edit');
Route::post('/motor/update/{id}', [MotorController::class, 'update'])->name('motor.update');
Route::post('/motor/delete/{id}', [MotorController::class, 'destroy'])->name('motor.destroy');

Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/{id}', [MobilController::class, 'show'])->name('mobil.show');
Route::get('/mobil/edit/{id}', [MobilController::class, 'edit'])->name('mobil.edit');
Route::post('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
Route::post('/mobil/delete/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');

Route::get('/resto', [RestoController::class, 'index'])->name('resto.index');
Route::get('/resto/create', [RestoController::class, 'create'])->name('resto.create');
Route::post('/resto', [RestoController::class, 'store'])->name('resto.store');
Route::get('/resto/{id}', [RestoController::class, 'show'])->name('resto.show');
Route::get('/resto/edit/{id}', [RestoController::class, 'edit'])->name('resto.edit');
Route::post('/resto/update/{id}', [RestoController::class, 'update'])->name('resto.update');
Route::post('/resto/delete/{id}', [RestoController::class, 'destroy'])->name('resto.destroy');