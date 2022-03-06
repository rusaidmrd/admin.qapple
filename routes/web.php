<?php

use App\Http\Controllers\AdminAuthController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');



Route::middleware('guest:admin')->group(function(){
    Route::post('/register', [AdminAuthController::class,'register'])->name('admin.register');
    Route::get('/register', [AdminAuthController::class,'registerPage'])->name('admin.register.page');
    Route::post('/login', [AdminAuthController::class,'login'])->name('admin.login');
    Route::get('/login', [AdminAuthController::class,'loginPage'])->name('admin.login.page');
});

Route::post('/logout', [AdminAuthController::class,'logout'])->middleware('auth:admin')->name('admin.logout');

Route::middleware('auth:admin')->group(function(){
    Route::get('/categories', function(){
        return view('pages.category.index');
    })->name('category.index');
});


require __DIR__.'/auth.php';
