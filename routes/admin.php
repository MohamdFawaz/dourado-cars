<?php

use App\Http\Controllers\Admin\CarMakeController;
use App\Http\Controllers\Admin\CarModelController;
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

        Route::group(['prefix' => 'car-model'],function () {
            Route::get('/',[CarModelController::class, 'index'])->name('car-model.index');
            Route::get('/create',[CarModelController::class, 'create'])->name('car-model.create');
            Route::post('/',[CarModelController::class, 'store'])->name('car-model.store');
            Route::get('/edit/{id}',[CarModelController::class, 'edit'])->name('car-model.edit');
            Route::put('/update/{id}',[CarModelController::class, 'update'])->name('car-model.update');
            Route::delete('/delete/{id}',[CarModelController::class, 'destroy'])->name('car-model.delete');
        });
    });
});
