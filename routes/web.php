<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
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
