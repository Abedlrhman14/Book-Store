<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\discountsController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->group(function(){
    Route::get('/',[HomeController::class,'index']);
    Route::resource('discount',discountsController::class);
    Route::resource('category',CategoryController::class);
    Route::post('/add/discount/{category}',[CategoryController::class,'addDiscount'])->name('category.add.discount');
    // Route::prefix('discount')->name('discount.')->group(function(){
    //     Route::get('/create',[discountsController::class,'create'])->name('create');
    //     Route::get('/{id}',[discountsController::class,'show'])->name('show');
    //     Route::post('/',[discountsController::class,'store'])->name('store');
    //     Route::get('/edit/{discount}',[discountsController::class,'edit'])->name('edit');
    //     Route::put('/edit/{discount}',[discountsController::class,'update'])->name('update');
    //     Route::delete('/{discount:code}',[discountsController::class,'destroy'])->name('destroy');
    // });
});
