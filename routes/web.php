<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/countries',[CountryController::class, 'index'])->name('country.index');
Route::post('/countries/{country}/increment',[CountryController::class, 'increment'])->name('country.increment');
Route::post('/countries/{country}/decrement',[CountryController::class, 'decrement'])->name('country.decrement');
Route::delete('/countries/{country}',[CountryController::class, 'delete'])->name('country.delete');
Route::get('/page2', function () {
    return view('page2');
})->name('page2');
Route::post('login', [FormController::class, 'login'])->name('login');
