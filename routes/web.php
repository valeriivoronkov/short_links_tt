<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

Route::view('/', 'welcome')->name('home');

Route::get('/{shortCode}', RedirectController::class)
    ->name('short-links.redirect');

require __DIR__.'/settings.php';
