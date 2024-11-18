<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;

Route::get('/', [MainPageController::class, 'index'])->name('main.page');
Route::post('/submit', [MainPageController::class, 'submit'])->name('form.submit');
