<?php

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

// User
Route::group(['middleware' => ['auth']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/exit', [App\Http\Controllers\HomeController::class, 'exit'])->name('exit');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('/profile/{id}', [App\Http\Controllers\HomeController::class, 'editUser'])->name('profile');
Route::patch('/update1/{id}', [App\Http\Controllers\HomeController::class, 'update1']);
Route::get('/saved', function () {return view('saved');});
// Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'viewCart'])->name('cart');
Route::post('/cartadd', [App\Http\Controllers\CartController::class, 'cartAdd']);
Route::delete('/destroy1/{id}', [App\Http\Controllers\CartController::class, 'destroyItem']); 
Route::post('/transaction', [App\Http\Controllers\CartController::class, 'transaction']);
});

// Admin Only
Route::group(['middleware' => ['admin']], function () {
Route::get('/adminmain', [App\Http\Controllers\AdminController::class, 'adminView'])->name('adminmain');
Route::get('/update/{id}', [App\Http\Controllers\AdminController::class, 'editRole'])->name('editrole');
Route::put('/update/{id}', [App\Http\Controllers\AdminController::class, 'update']);
Route::delete('/destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroyItem']); 
});

