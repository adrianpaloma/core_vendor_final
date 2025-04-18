<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryReportController;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/try', function(){
    return view('InventoryManagement.LowStockAlerts');
});

Route::get('/dashboard', function () {
    Stripe::setApiKey(env('STRIPE_SECRET'));
    $user = Auth::user();
    $products = \Stripe\Product::all();
    $products = array_filter($products->data, function($product) use ($user){
        return $product->metadata->stripe_account == $user->stripe_account_id && $product->active == true;
    });
    $orders = \Stripe\Checkout\Session::all();
    $orders = array_filter($orders->data, function($order) use ($user){
        return $order->metadata->vendor_id == $user->stripe_account_id;
    });
    $balance = \Stripe\Balance::retrieve(['stripe_account' => $user->stripe_account_id]);

    return view('dashboard', compact('products', 'orders', 'balance'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Subscription Controller
    Route::get('/subscription_plan', [SubscriptionController::class, 'subscription_plan'])->name('subscription_plan');
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

    //Product Controller
    Route::get("/ProductList", [ProductController::class, 'index'])->name('ProductList');
    Route::post('/product_store', [ProductController::class, 'store'])->name('product_store');
    Route::put('/product_update/{product_id}', [ProductController::class, 'update'])->name('product_update');
    Route::delete('/product_delete/{product_id}', [ProductController::class, 'destroy'])->name('product_delete');

    //Order Controller
    Route::get("OrderList", [OrderController::class, 'index'])->name('OrderList');
    Route::get("OrderDetails/{order_id}", [OrderController::class, 'order_detail'])->name('OrderDetails');
    Route::get('/VehicleReservation', [OrderController::class, 'vehicle_reservation'])->name('VehicleReservation');
    Route::get('/CustomerInfo/{order_id}', [OrderController::class, 'customer_info'])->name('CustomerInfo');

    //Payout Controller
    Route::get('/PayoutRequest', [PayoutController::class, 'index'])->name('PayoutRequest');

    //Sales Report Controller
    Route::get('/SalesReport', [SalesReportController::class, 'index'])->name('SalesReport');

    //Inventory Report Controller
    Route::get('/InventoryReports', [InventoryReportController::class, 'index'])->name('InventoryReports');

    Route::get('/StocksControl', [InventoryController::class , 'index'])->name('StocksControl');
    Route::put('/stock-update/{id}', [InventoryController::class, 'update_stock'])->name('stock_update');

    Route::get('/LowStockAlerts', [InventoryController::class, 'low_stock_alerts'])->name('LowStockAlerts');
    Route::get('/TransactionHistory', [TransactionController::class, 'index'])->name('TransactionHistory');
    
});

Route::get('/logout', function(){
    Auth::logout();

    return redirect('/');
});

require __DIR__.'/auth.php';

//View Controller

Route::get("ManageReturns", function () {
    return view("Orders.ManageReturns"); 
})->name('ManageReturns');
Route::get("AddNewProducts", function () {
    return view("Products.AddNewProducts"); 
})->name('AddNewProducts');
Route::get("CategoryManagement", function () {
    return view("Products.CategoryManagement"); 
})->name('CategoryManagement');
Route::get("ManageSuppliers", function () {
    return view("InventoryManagement.ManageSuppliers"); 
})->name('ManageSuppliers');
Route::get("Refunds", function () {
    return view("PaymentProcessing.Refunds"); 
})->name('Refunds');
Route::get("CustomerSupport", function () {
    return view("CRM.CustomerSupport"); 
})->name('CustomerSupport');
Route::get("ProductReview", function () {
    return view("Products.ProductReview"); 
})->name('ProductReview');

Route::get('/stripe_sync', function () {
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $a  = \Stripe\Product::all(['type' => 'good']);

    return json_encode($a);
});

