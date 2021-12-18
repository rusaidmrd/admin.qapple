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
})->middleware(['auth'])->name('dashboard');


Route::post('/admin/register', [AdminAuthController::class,'register'])->name('admin.register');
Route::get('/admin/register', [AdminAuthController::class,'registerPage'])->name('admin.register.page');
Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login');
Route::get('/admin/login', [AdminAuthController::class,'loginPage'])->name('admin.login.page');

require __DIR__.'/auth.php';
