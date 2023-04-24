<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [LoginController::class, 'Login']);
Route::get('/admin', [AdminController::class,'admin']);
Route::get('/userRegistration', [AdminController::class, 'userRegistration']);
Route::get('/foodRegistration', [AdminController::class, 'foodRegistration']);
Route::get('/groupRegistration', [AdminController::class, 'groupRegistration']);
