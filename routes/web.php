<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontend\ShoppingCart;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\Backend\CoupneController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\Backend\CustomerController as BackendCustomerController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\Backend\TestimonialController;

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

Route::prefix('admin/')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/logout', 'adminLogout')->name('admin.logout');
    });

    // CATEGORY
    Route::resource('category', CategoryController::class);

    // Testimonial
    Route::resource('testimonial', TestimonialController::class);

    // product
    Route::resource('product', ProductController::class);

    // coupne
    Route::resource('coupne', CoupneController::class);

    Route::get('order-list', [OrderController::class, 'index'])->name('admin.orderlist');
    Route::get('customer-list', [BackendCustomerController::class, 'index'])->name('admin.customerlist');

});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'shopPage'])->name('shop.page');
Route::get('/single-product/{product_slug}', [ShopController::class, 'singleProduct'])->name('single.product');
Route::get('/shoping-cart', [ShoppingCart::class, 'shoppingCartpage'])->name('shopping.cart.page');
Route::post('/shoping-cart', [ShoppingCart::class, 'shoppingCart'])->name('shopping.cart');
Route::get('/shoping-cart-remove/{rowId}', [ShoppingCart::class, 'removeFromCart'])->name('shopping.cart.remove');

// user auth
Route::get('/login', [RegisterController::class, 'customerLoginpage'])->name('customer.login');
Route::get('/register', [RegisterController::class, 'customerRegisterpage'])->name('customer.register');
Route::post('/register', [RegisterController::class, 'customerRegister'])->name('register.customer');
Route::post('/login', [RegisterController::class, 'customerLogin'])->name('login.customer');

Route::middleware(['auth', 'is_customer'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');
    Route::get('/logout', [CustomerController::class, 'customerLogout'])->name('customer.logout');

    Route::post('/cart/apply-coupon', [CartController::class, 'applyCupon'])->name('apply.cupon');
    Route::get('/cart/remove-coupon/{coupne_name}', [CartController::class, 'removeCupon'])->name('remove.cupon');

    Route::get('checkout', [CheckoutController::class, 'checkoutPage'])->name('customer.checkoutpage');
    Route::post('placeorder', [CheckoutController::class, 'placeOrder'])->name('customer.placeorder');

    /*AJAX Call */
    Route::get('/upzilla/ajax/{district_id}', [CheckoutController::class, 'loadUpazillaAjax'])->name('loadupazila.ajax');
});
require __DIR__ . '/auth.php';
