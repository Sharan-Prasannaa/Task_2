<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;

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
Route::middleware('admin')->group(function(){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware('admin');
});

Route::middleware(['customer'])->group(function(){
    Route::get('/customer',[HomeController::class,'customer'])->middleware('customer');
});


Route::get('/',[HomeController::class,'index']);

Route::get('/register',[AuthController::class,'register']);
Route::post('/create',[AuthController::class,'create']);
Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'checkUser']);

