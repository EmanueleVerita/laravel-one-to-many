<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Dashboard\MovieController;
use App\Http\Controllers\Admin\Dashboard\CategoryController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');

Route::middleware(['auth' , 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function (){

    Route::get('/dashboard' , DashboardController::class , 'dashboard')->name('dashboard');
    Route::resource('movies' , MovieController::class);

    Route::resource('categories' , CategoryController::class);


});


//Route::prefix('admin')
   // ->name('admin.')
   // ->middleware(['auth', 'verified'])
   // ->group(function () {

 //   Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');

//});

require __DIR__.'/auth.php';
