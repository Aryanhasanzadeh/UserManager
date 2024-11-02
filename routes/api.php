<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)
    ->prefix('users')
    ->name('users.')
    ->group(function (){
       Route::get('/', 'index');
       Route::post('/', 'store');
       Route::put('/{user}', 'update');
       Route::delete('/{user}', 'destroy');
    });
