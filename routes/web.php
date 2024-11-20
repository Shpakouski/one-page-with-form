<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\FormController;

Route::get('/', [MainPageController::class, 'index'])->name('main.page');
Route::post('/form-submit', [FormController::class, 'submit'])->name('form.submit');
