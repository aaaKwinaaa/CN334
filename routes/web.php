<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Admin\TaskController;


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

Auth::routes(['register' => true]);

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('role_admin');
// Route::get('/task',[AdminController::class,'task'])->name('admin.task')->middleware('role_admin');
Route::get('/reviewer/home',[HomeController::class,'reviewerHome'])->name('reviewer.home')->middleware('role_reviewer');
Route::get('/restaurant/home',[RestaurantController::class,'index'])->name('restaurant.home')->middleware('role_restaurant');
Route::get('store_image/fetch_image/{id}','RestaurantController@fetch_image');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role_admin']], function () {
    
    Route::redirect('/', '/admin/home');
    // Task
    Route::resource('task', TaskController::class);

    
});

Route::group(['prefix' => 'restaurant', 'as' => 'restaurant.', 'middleware' => ['role_restaurant']], function () {
    Route::redirect('/', '/restaurant/home');
    // create
    Route::resource('manage',RestaurantController::class);

    // // store
    // Route::get('/',[RestaurantController::class,'store'])->name('store');


});