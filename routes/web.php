<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::display');
Route::livewire('/report', 'pages::report');

require __DIR__ . '/settings.php';
