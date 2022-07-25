<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;

Route::get('/', [ShopController::class, 'index']); 
Route::get('/detail/{id}', [ShopController::class, 'detail']); 
Route::get('/search', [ShopController::class, 'search']);
Route::get('/thanks', [ThanksController::class, 'thanks']); 
Route::middleware(['auth'])->group(function(){
    Route::post('/favorite/{id}', [FavoriteController::class, 'store']);
    Route::post('/favorite/destroy/{id}', [FavoriteController::class, 'destroy']); 
    Route::get('/done', [ReserveController::class, 'index']); 
    Route::post('/reserve', [ReserveController::class, 'store']); 
    Route::post('/reserve/update/{id}', [ReserveController::class, 'update']); 
    Route::post('/reserve/destroy/{id}', [ReserveController::class, 'destroy']); 
    Route::get('/mypage/{id}', [UserController::class, 'mypage']); 
});

require __DIR__.'/auth.php'; 

