<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('/display', 'pages::display')->name('display');
Route::livewire('/report', 'pages::report')->name('report');

require __DIR__.'/settings.php';
