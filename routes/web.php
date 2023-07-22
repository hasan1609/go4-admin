<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;

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

Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');
Route::get('/drivers/{id}', [DriverController::class, 'show'])->name('drivers.show');
Route::get('/drivers/edit/{id}', [DriverController::class, 'edit'])->name('drivers.edit');
Route::post('/drivers/{id}', [DriverController::class, 'update'])->name('drivers.update');
Route::post('/drivers/delete/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy');
