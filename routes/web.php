<?php

use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseOrderController;
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
Route::post('/login', [SessionsController::class, 'submitLogin'])->name('login'); //submit Login form
Route::post('/logout', [SessionsController::class. 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
//supplier's form route
Route::get('/add.supplier', [SupplierController::class, 'create']);
Route::post('/add.supplier', [SupplierController::class, 'store'])->name('add.supplier');

Route::get('/edit.supplier/{supplier}', [SupplierController::class, 'edit'])->name('edit.supplier.getmethod');
Route::post('/edit.1supplier/{supplier}', [SupplierController::class, 'update'])->name('edit.supplier');
Route::post('/delete-supplier/{supplier}', [SupplierController::class, 'destroy'])->name('delete-supplier');

Route::get('/purchase-orders', [PurchaseOrderController::class, 'create'])->name('purchase-order');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/inventory-form', [InventoryController::class, 'create']);
Route::post('inventory-form', [InventoryController::class, 'store'])->name('add.product');

Route::get('/edit/{product}', [InventoryController::class, 'edit'])->name('edit');
Route::post('/edit-product{product}',[InventoryController::class, 'update'])->name('edit-product');
Route::post('/delete/{product}', [InventoryController::class, 'destroy'])->name('delete');


