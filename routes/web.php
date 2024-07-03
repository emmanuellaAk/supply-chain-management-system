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
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

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

Route::get('/register', [CustomerController::class, 'viewRegisterForm']); //view form
Route::post('/register', [CustomerController::class, 'store'])->name('register'); //send form
// Route::get('/edit-profile/{user}', [CustomerController::class, 'edit'])->name('edit-profile');
// Route::post('/update/{user}', [CustomerController::class, 'update'])->name('update');
Route::get('/', [SessionsController::class, 'create']); //view login form
Route::post('/login', [SessionsController::class, 'submitLogin'])->name('login'); //submit Login form
Route::get('/login/customer', [CustomerController::class, 'index'])->name('customer.login');
Route::post('/login/customer', [SessionsController::class, 'customerLogin'])->name('customer.login.post');
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('new-role');

Route::get('/customer/dashboard', function () {
    return view('customers.dashboard');
})->name('customer-dashboard');

Route::get('/customers',[CustomerController::class, 'viewCustomers'])->name('view.Customers');


Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers')->middleware('new-role');
Route::get('/add.supplier', [SupplierController::class, 'create'])->name('view.supplier')->middleware('new-role');
Route::post('/add.supplier', [SupplierController::class, 'store'])->name('add.supplier')->middleware('new-role');
Route::get('/edit.supplier/{supplier}', [SupplierController::class, 'edit'])->name('edit.supplier.getmethod')->middleware('new-role');;
Route::post('/edit.1supplier/{supplier}', [SupplierController::class, 'update'])->name('edit.supplier')->middleware('new-role');
Route::post('/delete-supplier/{supplier}', [SupplierController::class, 'destroy'])->name('delete-supplier')->middleware('new-role');

Route::get('/all-purchases',[PurchaseOrderController::class, 'index'])->name('all-purchases')->middleware('new-role');
Route::get('/purchase-orders', [PurchaseOrderController::class, 'create'])->name('purchase-order')->middleware('new-role');
Route::post('/add-purchase-orders',[PurchaseOrderController::class, 'store'])->name('addPurchaseOrder')->middleware('new-role');
Route::get('/received/{id}',[PurchaseOrderController::class, 'received'])->name('received')->middleware('new-role');
Route::get('/receive/{id}', [PurchaseOrderController::class, 'receive'])->name('receive')->middleware('new-role');
Route::get('/declined/{id}', [PurchaseOrderController::class, 'declined'])->name('declined')->middleware('new-role');
Route::get('/filter',[PurchaseOrderController::class, 'filter'])->name('filter')->middleware('new-role');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory')->middleware('new-role');
Route::get('/inventory-form', [InventoryController::class, 'create'])->name('inventory-create')->middleware('new-role');
Route::post('inventory-form', [InventoryController::class, 'store'])->name('add.product')->middleware('new-role');
Route::get('/products',[InventoryController::class, 'viewProducts'])->name('viewProducts');
Route::get('/customer/orders',[InventoryController::class, 'viewOrders'])->name('viewOrders');
Route::post('/product',[InventoryController::class, 'addProducts'])->name('addProducts');
Route::get('/edit/{product}', [InventoryController::class, 'edit'])->name('edit')->middleware('new-role');
Route::post('/edit-product{product}',[InventoryController::class, 'update'])->name('edit-product')->middleware('new-role');
Route::post('/delete/{product}', [InventoryController::class, 'destroy'])->name('delete')->middleware('new-role');


// Route::get('/customersPage', [CustomersController::class, 'index'])->name('customersPage');
// Route::get('/customers',[CustomersController::class,'create'])->name('customer-form');
// // Route::get('/', [SessionsController::class, 'create']); //view login form
// // Route::post('/login', [SessionsController::class, 'submitLogin'])->name('login'); //submit Login form
// // Route::post('/logout', [SessionsController::class. 'destroy'])->name('logout');
// Route::post('add/customer',[CustomersController::class,'store'])->name('addCustomer');
// Route::get('editCustomer/{id}',[CustomersController::class, 'edit'])->name('editCustomer');
// Route::post('updateCustomer/{id}',[CustomersController::class, 'update'])->name('updateCustomer');
// Route::post('deleteCustomer/{id}',[CustomersController::class, 'delete'])->name('deleteCustomer');

// Route::get('/received/{id}',[CustomersController::class,'received'])->name('received');
// Route::get('/canceled/{id}',[CustomersController::class, 'canceled'])->name('canceled');

// Route::get('/salesPoint',[OrdersController::class, 'index'])->name('salesPoint');
// Route::post('/sendCart',[OrdersController::class, 'store'])->name('orderInfo');
// Route::get('/showOrders', [OrdersController::class, 'show'])->name('showOrders');
// Route::get('/received/{id}', [OrdersController::class, 'received'])->name('received');
// Route::get('/canceled/{id}', [OrdersController::class, 'canceled'])->name('canceled');
