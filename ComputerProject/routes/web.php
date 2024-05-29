<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route cho người dùng
Route::any('/', [UserController::class, 'index'])->name('/');
Route::any('search', [UserController::class, 'search'])->name('search');
Route::get('categories/{category_id}', [UserController::class, 'categoryProducts'])->name('category.products');

Route::prefix('user')->name('user.')->group(function () {
    Route::any('shopcart', [UserController::class, 'shopcart'])->name('shopcart');
    Route::get('categories', [UserController::class, 'categories'])->name('categories');
    Route::get('productdetails/{id}', [UserController::class, 'productdetails'])->name('productdetails');
    // Hiển thị form đăng nhập
    Route::get('login', [UserController::class, 'showLoginForm'])->name('login');

    // Xử lý yêu cầu đăng nhập
    Route::post('login', [UserController::class, 'login'])->name('login.post');

    // Xử lý yêu cầu đăng xuất
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

// Route cho admin
Route::any('adminform', [AdminController::class, 'adminform'])->name('adminform');
