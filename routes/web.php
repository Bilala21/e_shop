<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/', function () {
    return view('index');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest', 'PreventDefaultHistory'])->group(function () {
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        Route::get('/login', [MainController::class, 'login'])->name('login');
    });
    Route::middleware(['auth', 'PreventDefaultHistory'])->group(function () {
        Route::view('/cart', 'cart.cart')->name('cart');
        Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::post('/addToCart', [UserController::class, 'addToCart'])->name('addToCart');
    });
});
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });
        Route::middleware(['auth:admin', 'PreventDefaultHistory'])->group(function () {

        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        Route::get('/create', [AdminController::class, 'create'])->name('create');
        
        Route::post('/add-category', [AdminController::class, 'addCategory'])->name('add-category');
        Route::get('/parent-category', [AdminController::class, 'parentCategory'])->name('parent-category');
        Route::post('/add-brand', [AdminController::class, 'addBrand'])->name('add-brand');
        Route::get('/brand-id', [AdminController::class, 'brand_id'])->name('brand-id');

        Route::get('/select-category', [AdminController::class, 'selectCategory'])->name('select-category');

        Route::post('/add-product', [AdminController::class, 'addProduct'])->name('add-product');

        Route::post('/edit', [AdminController::class, 'edit'])->name('edit');

        Route::post('/update', [AdminController::class, 'update'])->name('update');
        
        Route::get('/product/all', [AdminController::class, 'showProd'])->name('product/all');

        Route::get('/product/single/{id}', [AdminController::class, 'singleProd'])->name('product/single');

        Route::post('/destory', [AdminController::class, 'destory'])->name('destory');

        Route::get('/single/post', [AdminController::class, 'singlePost'])->name('single/post');

        Route::get('/post/all', [AdminController::class, 'singlePost'])->name('post/all');

        Route::get('/users', [AdminController::class, 'getAllUser'])->name('users');

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

// index page route
Route::get('/index/{id?}', [MainController::class, 'index'])->name('index');
Route::get('/whishlist/{id?}', [MainController::class, 'whishlist'])->name('whishlist');
// Route::get('/category/id={id}', [MainController::class, 'prodyctById'])->name('/category/id=');
// blog page route
Route::get('/post', [MainController::class, 'blog'])->name('post');
Route::get('/post/single', [MainController::class, 'singleBlog'])->name('post/single');
// product details
Route::get('/product-detail', [MainController::class, 'productDetail'])->name('product-detail');
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
// contact us
Route::get('/contact-us', [MainController::class, 'contactus'])->name('contact-us');
// category
Route::prefix('/product')->name('product.')->group(function(){
    Route::get('/category',[ProductController::class,'getCategory']);
});
// 4040 page
Route::get('/not-found', [MainController::class, 'not_found'])->name('not-found');


// multy level category

Route::get('/multy/category',[CategoryController::class,'index']);
Route::post('/sub/create',[CategoryController::class,'index'])->name('sub/create');
Route::get('/sub/getAll',[CategoryController::class,'getAllCat'])->name('sub/getAll');
