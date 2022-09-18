<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\postController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'Home']);
Route::get('/admin/login',[AdminController::class,'Login']);
Route::get('/admin/logout',[AdminController::class,'logout']);
Route::post('/admin/login',[AdminController::class,'Submit_login']);
Route::get('/admin/dashboard',[AdminController::class,'Dashboard']);
//categoris
Route::get('admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category',CategoryController::class);
//post
Route::get('admin/post/{id}/delete',[postController::class,'destroy']);
Route::resource('admin/post',postController::class);
