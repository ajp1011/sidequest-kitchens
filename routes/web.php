<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/menus', 'menus')->name('menus');
Route::view('/order', 'order')->name('order');
