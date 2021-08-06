<?php

use App\Http\Controllers\Admin\CarMakeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => "admin"], function (){
    Auth::routes();
    Route::group(['middleware' => 'auth'],function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'car-make'],function () {
            Route::get('/',[CarMakeController::class, 'index'])->name('car-make.index');
            Route::get('/create',[CarMakeController::class, 'create'])->name('car-make.create');
            Route::post('/',[CarMakeController::class, 'store'])->name('car-make.store');
            Route::get('/edit/{id}',[CarMakeController::class, 'edit'])->name('car-make.edit');
            Route::put('/update/{id}',[CarMakeController::class, 'update'])->name('car-make.update');
            Route::put('/toggle-activation',[CarMakeController::class, 'toggleActivation'])->name('car-make.toggle-activation');
        });
    });
});
