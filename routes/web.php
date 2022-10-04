<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

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

Route::view('/','home')->name('home');
Route::view('/about','about')->name('about');
Route::get('/portfolio',[PortfolioController::class, 'index'])->name('portaforlio');
Route::view('/contact','contact')->name('contact');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');



Route::get('/', function () {
    return view('home');
});

Route::resource('client',ClientController::class);
Route::resource('Teacher',TeacherController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
