<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['middleware'=>'admin'], function(){
    Route::resource('/admin/users', AdminUsersController::class);
    Route::resource('/admin/posts', AdminPostsController::class);
    Route::resource('/admin/categories', AdminCategoriesController::class);
});



///////////////////////////////////////////////////////
/// ROUTE FOR RANDOM USER CREATION////////////////////
Route::get('/cru', [AdminUsersController::class, 'create_random_user']);

