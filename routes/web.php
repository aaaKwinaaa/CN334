<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Restaurant\ProfileRestaurantController;


use App\Http\Controllers\Reviewer\ReviewerController;
use App\Http\Controllers\Reviewer\ProfileReviewerController;

use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\ManageAdminController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ActiveRestaurantController;



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
    return view('welcome2');
});

Auth::routes(['register' => true]);

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('role_admin');
Route::get('/reviewer/home',[HomeController::class,'reviewerHome'])->name('reviewer.home')->middleware('role_reviewer');
Route::get('/restaurant/home',[RestaurantController::class,'index'])->name('restaurant.home')->middleware('role_restaurant');



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role_admin']], function () {
    Route::redirect('/', '/admin/home');

    // CRUD
    Route::resource('task', TaskController::class);
    


    //User Admin Management
    Route::resource('account',ManageAdminController::class);

    //Comment Management
    Route::resource('comment',CommentController::class);

    //Restaurant Active Management
    Route::resource('active',ActiveRestaurantController::class);

    
    
});

Route::group(['prefix' => 'restaurant', 'as' => 'restaurant.', 'middleware' => ['role_restaurant']], function () {
    Route::redirect('/', '/restaurant/home');

    //CRUD
    Route::resource('manage',RestaurantController::class);

    //Profile Management
    Route::resource('profile',ProfileRestaurantController::class);
   


});

Route::group(['prefix' => 'reviewer', 'as' => 'reviewer.', 'middleware' => ['role_reviewer']], function () {
    Route::redirect('/', '/reviewer/home');

    //CRUD
    Route::resource('page',ReviewerController::class);

    //Profile Management
    Route::resource('profile',ProfileReviewerController::class);
});