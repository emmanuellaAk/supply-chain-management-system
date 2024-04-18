<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthenticationController;

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
//      return view('welcome');
// });

Route::get('/register', [AuthenticationController::class, 'viewRegisterForm']); //view form
Route::post('/register', [AuthenticationController::class, 'store'])->name('register'); //send form

Route::get('/', [SessionsController::class, 'create']); //view login form
Route::post('/login', [SessionsController::class, 'submitLogin'])->name('login');//submit Login form


Route::get('/dashboard', function () {
     return view('dashboard');
})->name('dashboard');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
//supplier's form route
Route::get('/showSuppliers', [SupplierController::class, 'create']);
Route::post('/showSuppliers', [SupplierController::class, 'store'])->name('show.suppliers');

