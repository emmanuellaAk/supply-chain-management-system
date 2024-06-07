 <?php

use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomersController;
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
Route::get('/edit-profile/{user}', [AuthenticationController::class, 'edit'])->name('edit-profile');
Route::post('/update/{user}', [AuthenticationController::class, 'update'])->name('update');

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

Route::get('/all-purchases',[PurchaseOrderController::class, 'index'])->name('all-purchases');
Route::get('/purchase-orders', [PurchaseOrderController::class, 'create'])->name('purchase-order');
Route::post('/add-purchase-orders',[PurchaseOrderController::class, 'store'])->name('addPurchaseOrder');
Route::get('/received/{id}',[PurchaseOrderController::class, 'received'])->name('received');
Route::get('/receive/{id}', [PurchaseOrderController::class, 'receive'])->name('receive');
Route::get('/declined/{id}', [PurchaseOrderController::class, 'declined'])->name('declined');
Route::get('/filter',[PurchaseOrderController::class, 'filter'])->name('filter');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/inventory-form', [InventoryController::class, 'create']);
Route::post('inventory-form', [InventoryController::class, 'store'])->name('add.product');

Route::get('/edit/{product}', [InventoryController::class, 'edit'])->name('edit');
Route::post('/edit-pro   duct{product}',[InventoryController::class, 'update'])->name('edit-product');
Route::post('/delete/{product}', [InventoryController::class, 'destroy'])->name('delete');

Route::get('/customersPage', [CustomersController::class, 'index'])->name('customersPage');
Route::get('/customers',[CustomersController::class,'create'])->name('customer-form');
Route::post('add/customer',[CustomersController::class,'store'])->name('addCustomer');
// Route::get('/received/{id}',[CustomersController::class,'received'])->name('received');
// Route::get('/canceled/{id}',[CustomersController::class, 'canceled'])->name('canceled');

Route::get('/salesPoint',[OrdersController::class, 'index'])->name('salesPoint');
Route::post('/sendCart',[OrdersController::class, 'store'])->name('orderInfo');
Route::get('/showOrders', [OrdersController::class, 'show'])->name('showOrders');
Route::get('/received/{id}', [OrdersController::class, 'received'])->name('received');
Route::get('/canceled/{id}', [OrdersController::class, 'canceled'])->name('canceled');
