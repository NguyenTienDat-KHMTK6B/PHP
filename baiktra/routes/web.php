<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

 
Route::any('/', [ UserController::class, 'trangchu' ] )->name('/');

Route::any('sanpham', [ UserController::class, 'sanpham' ] )->name('sanpham');