<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
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


Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/confirm', function () {
    return view('pages.confirmation');
});


Route::get('/profile', function () {
    return view('pages.profileDetails');
});




Route::get('/' , 'App\Http\Controllers\CategoryController@showCategory');
Route::get('/order' , 'App\Http\Controllers\OrderController@showOrders');
Route::get('/checkout' , 'App\Http\Controllers\CartController@checkout')->name('checkout');


Route::resource('contact', ContactController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('cart', CartController::class);
Route::resource('orders', OrderController::class);
Route::resource('comments', CommentController::class);






//admin Routes
Route::post('category/{id}', [CategoryController::class, 'update'])->name('updateCategory');
Route::post('product/{id}', [ProductController::class, 'update'])->name('updateroduct');

Route::get('/admindash',[OrderController::class,'viewOrders'] )->name('admindash');
Route::post('cancel/{id}',[OrderController::class,'cancel'] )->name('cancel');
Route::post('shipp/{id}',[OrderController::class,'shipped'] )->name('shipped');
Route::post('pend/{id}',[OrderController::class,'pending'] )->name('pending');
Route::post('delever/{id}',[OrderController::class,'delevered'] )->name('delevered'); ;
Route::post('process/{id}',[OrderController::class,'process'] )->name('process'); ;






























// components routes
// Route::get('/', HomeComponent::class);
// Route::get('/contact', ContactComponent::class);
// Route::get('/shop', ShopComponent::class);

// Route::get('/about', AboutComponent::class);

// Route::get('/product/{slug}',ProductDetailsComponent::class )->name('product.details');

// Route::get('/cart', CartComponent::class)->name('product.cart');

// Route::get('/profile', ProfileDetailsComponent::class);

// Route::get('/orders' , OrdersComponent::class);
// Route::get('/checkout' , CheckoutComponent::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// For User
// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::get('/user/dashboard', UserDashboardComponent::class) ->name('user.dashboard');
// });


// // For Admin
// Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
//     Route::get('/admin/dashboard', AdminDashboardComponent::class) ->name('admin.dashboard');
// });
