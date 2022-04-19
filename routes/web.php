<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PermissionComponent;
use App\Http\Livewire\Products\AddProduct;
use App\Http\Livewire\Products\EditProduct;
use App\Http\Livewire\Products\ViewProducts;
use App\Http\Livewire\UserManagement\RoleComponent;
use App\Http\Livewire\UserManagement\UserComponent;
use App\Http\Livewire\UserManagement\UserUpdateComponent;

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

Route::middleware(['guest'])->get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');



// Route::middleware('guest:admin')->group(function(){
//     Route::post('/register', [AdminAuthController::class,'register'])->name('admin.register');
//     Route::get('/register', [AdminAuthController::class,'registerPage'])->name('admin.register.page');
//     Route::post('/login', [AdminAuthController::class,'login'])->name('admin.login');
//     Route::get('/login', [AdminAuthController::class,'loginPage'])->name('admin.login.page');
// });

// Route::post('/logout', [AdminAuthController::class,'logout'])->middleware('auth:admin')->name('admin.logout');

Route::middleware(['auth'])->get('/categories', function(){
    return view('pages.category.index');
})->name('category.index');


Route::middleware(['auth'])->group(function(){

    Route::get('/permissions',PermissionComponent::class)->name('permissions.index');
    Route::get('/roles',RoleComponent::class)->name('roles.index');


    Route::prefix('users')->group(function(){
        Route::get('/',UserComponent::class)->name('users.index');
        Route::get('/create',[UserController::class,'create'])->name('users.create');
        Route::post('',[UserController::class,'store'])->name('users.store');
        Route::get('/edit/{user}',[UserController::class,'edit'])->name('users.edit');
    });

    Route::prefix('products')->group(function(){
        Route::get('/',ViewProducts::class)->name('products.index');
        Route::get('/create',AddProduct::class)->name('products.create');
        Route::get('/edit/{product}',EditProduct::class)->name('products.edit');
        Route::put('/update/{user}',[UserController::class,'update'])->name('users.update');
    });

});

