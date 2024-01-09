<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class,'home']);

Route::get('/aboutCompany', [MainController::class,'aboutCompany']);

Route::get('/price', [MainController::class,'price']);

Route::get('/createOrder', [MainController::class,'createOrder']);

Route::post('/createOrder/check', [MainController::class,'createOrder_check']);

Route::get('/input', [MainController::class,'input'])->name('input');

Route::post('/database', [MainController::class,'database'])->name('database');

Route::post('/databaseСlick', [MainController::class,'database_click']);

Route::get('/orderStatus', [MainController::class,'orderStatus']);

Route::post('/orderStatusSearch', [MainController::class,'orderStatusSearch']);
