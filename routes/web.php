<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::get('/', [HomeController::class, 'home']);
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::POST('/add_category', [AdminController::class, 'add_category']);
Route::GET('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::GET('/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::POST('/update_category/{id}', [AdminController::class, 'update_category']);
Route::GET('/add_product', [AdminController::class, 'add_product']);
Route::POST('/upload_product', [AdminController::class, 'upload_product']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::GET('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::GET('/update_product/{id}', [AdminController::class, 'update_product']);
Route::POST('/edit_product/{id}', [AdminController::class, 'edit_product']);
Route::GET('/product_search', [AdminController::class, 'product_search']);
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::get('/add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
Route::get('/mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);
Route::get('/myorders', [HomeController::class, 'myorders'])->middleware(['auth', 'verified']);
Route::GET('/delete_cart/{id}', [HomeController::class, 'delete_cart']);
Route::POST('/confirm_order', [HomeController::class, 'confirm_order']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/why', [HomeController::class, 'why']);
Route::get('/testimonial', [HomeController::class, 'testimonial']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::controller(HomeController::class)->group(function () {

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});

Route::GET('/view_orders', [AdminController::class, 'view_orders']);
Route::GET('/on_the_way/{id}', [AdminController::class, 'on_the_way']);
Route::GET('/delivered/{id}', [AdminController::class, 'delivered']);
Route::GET('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
