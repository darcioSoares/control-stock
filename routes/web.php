<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\BatchController;
use Illuminate\Http\Request;

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

Route::view('/', 'welcome');

Route::view('/t', 'simCards.index');
Route::post('/import-excel', function(Request $request){
    //dd();

    $file = $request->file('excel_file');
    dd($file);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    
Route::prefix('suppliers')->middleware('auth')->group(function () {

    Route::get('/list', [SuppliersController::class,'index'])->name('supplier.list');
    Route::get('/create', [SuppliersController::class,'create'])->name('supplier.create'); 
    Route::post('/create', [SuppliersController::class,'store'])->name('supplier.store');  

    Route::get('/edit/{id}', [SuppliersController::class,'edit'])->name('supplier.edit'); 
    Route::post('/update/{id}', [SuppliersController::class,'update'])->name('supplier.update'); 
    Route::get('/delete/{id}', [SuppliersController::class,'destroy'])->name('supplier.destroy'); 
    
});    

Route::prefix('sim-card')->middleware('auth')->group(function () {

    Route::get('/batch-list', [BatchController::class,'index'])->name('batch.list');
    Route::get('/batch-create', [BatchController::class,'create'])->name('batch.create'); 
    Route::post('/batch-store', [BatchController::class,'store'])->name('batch.store');  

    Route::get('/batch-edit/{id}', [BatchController::class,'edit'])->name('batch.edit'); 
    Route::post('/batch-edit/{id}', [BatchController::class,'update'])->name('batch.update'); 
    Route::get('/batch-delete/{id}', [BatchController::class,'destroy'])->name('batch.destroy');     
});    

require __DIR__.'/auth.php';
