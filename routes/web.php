<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
})->name('/');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/promotions', function () {
    return view('pages.promotions');
})->name('promotions');

Route::get('/contact', function () {
    return view('pages.contact-us');
})->name('contact');

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->name('dashboard');

Route::resource('dashboard', DashboardController::class);
Route::resource('invoice', InvoiceController::class);
Route::resource('users', UserController::class);
Route::resource('client', ClientController::class);
Route::get('/chart','App\Http\Controllers\ClientController@client_chart')->name('chart');
