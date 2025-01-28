<?php

use App\Http\Controllers\Dashboard\discountsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('discount')->name('discount.')->group(function()
{
   Route::get('/',[discountsController::class,'checkcode'])->name('check.code');
});

Route::prefix('discount')->name('discount.')->group(function()
{
   Route::get('/search',[discountsController::class,'search'])->name('search');
});
