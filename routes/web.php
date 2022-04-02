<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Livewire\PermissionComponent;

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
    Route::post('/permissions/store',[PermissionController::class,'store'])->name('permissions.store');
    Route::get('/permissions',PermissionComponent::class)->name('permissions.index');
    Route::get('/permissions/show/{permission}',[PermissionController::class,'show'])->name('permissions.show');
    Route::get('/permissions/create',[PermissionController::class,'create'])->name('permissions.create');
    Route::get('/permissions/edit/{permission}',[PermissionController::class,'edit'])->name('permissions.edit');
    Route::put('/permissions/update/{permission}',[PermissionController::class,'update'])->name('permissions.update');
    Route::delete('/permissions/delete/{permission}',[PermissionController::class,'destroy'])->name('permissions.delete');
});


