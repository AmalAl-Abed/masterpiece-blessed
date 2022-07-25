<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\HomeComponent;
// use App\Http\Livewire\ContactComponent;
// use App\Http\Livewire\ShopComponent;
// use App\Http\Livewire\AboutComponent;
// use App\Http\Livewire\CartComponent;
// use App\Http\Livewire\CheckoutComponent;
// use App\Http\Livewire\OrdersComponent;
// use App\Http\Livewire\ProductDetailsComponent;
// use App\Http\Livewire\ProfileDetailsComponent;
// use App\Http\Livewire\Admin\AdminDashboardComponent;
// use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
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

// Route::get('categories/{id}', [CategoryController::class])->name('categories.show');
// Route::get('products/{id}', [ProductController::class,'show'])->name('singleProduct.show');

Route::get('/about', function () {
    return view('pages.about');
});


Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/checkout', function () {
    return view('pages.checkout');
});



// Route::get('/shop', function () {
//     return view('pages.shop');
// });


Route::get('/cart', function () {
    return view('pages.cart');
});


Route::get('/orders', function () {
    return view('pages.orders');
});


Route::get('/product', function () {
    return view('pages.productDetails');
});




Route::get('/profile', function () {
    return view('pages.profileDetails');
});


Route::resource('pages/contact', ContactController::class);

Route::get('/' , 'App\Http\Controllers\CategoryController@showCategory');


Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('cart', CartController::class);






























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
