<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\admin\AuthorsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WebsiteProductController;






// //Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontController ::class, 'index'])->name('front.home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
   //register login routes
Route::middleware(['web'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/products', [ProductController::class, 'website'])->name('products.website');
    
});
//website products
Route::get('/products', [ShopController::class, 'showProducts'])->name('products.website');
Route::get('/product/{id}', [ShopController::class, 'show'])->name('product.show');
//category featched
Route::get('/category/{id}/products', [FrontController::class, ' ShowProductsCategory'])->name('category.products');
Route::get('/category/{id}/products', [ShopController::class, 'productsByCategory'])->name('category.products');
//Route::get('/products-by-category', [ShopController::class, 'showByCategory']);
//Route::get('/category/{slug}', [WebsiteProductController::class, 'show'])->name('category.show');
///add to cart
 Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
 Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
 Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
 //order confirmation 
 Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');
 Route::get('/order{id}', [CartController::class, 'orderRecieved'])->name('checkout.success');
 Route::get('/track-order', [CartController::class, 'trackOrder'])->name('order.track');




 









//middleware
Route::group(['prefix'=>'admin'],function(){
    Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    }); 
    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');
//catogry routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        
   //temp-images.create
   Route::post('/upload-temp-image', [TempImageController::class, 'create'])->name('temp-images.create');
   Route::post('/admin/products/upload-photo', [ProductController::class, 'uploadPhoto'])->name('product.uploadPhoto');
 
   //category edit
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    //category update
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
// authors routes
Route::get('/authors', [AuthorsController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorsController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorsController::class, 'store'])->name('authors.store');
Route::get('/authors/{author}/edit', [AuthorsController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{author}', [AuthorsController::class, 'update'])->name('authors.update');
Route::delete('/authors/{id}', [AuthorsController::class, 'destroy'])->name('authors.delete');
//Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

//Product image 



    



    });
});
