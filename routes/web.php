<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('role_admin');
Route::get('/reviewer/home',[HomeController::class,'reviewerHome'])->name('reviewer.home')->middleware('role_reviewer');
Route::get('/restaurant/home',[HomeController::class,'restaurantHome'])->name('restaurant.home')->middleware('role_restaurant');