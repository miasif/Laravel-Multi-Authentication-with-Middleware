<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Author\AuthorDashboardController;



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
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('password.change');
Route::post('/change-password', [ChangePasswordController::class, 'changepassword'])->name('password.update');

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth','admin']],
function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
});
Route::group(['as'=>'author.','prefix'=>'author', 'namespace'=>'Author','middleware'=>['auth','author']],
function(){
    Route::get('dashboard',[AuthorDashboardController::class,'index'])->name('dashboard');
});
