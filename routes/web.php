<?php

use Illuminate\Support\Facades\Route;

Route::view('/prototypes/flowbite/index', '/prototypes.flowbite.index');
Route::view('/prototypes/flowbite/alert', '/prototypes.flowbite.alert');
Route::view('/prototypes/flowbite/accordion', '/prototypes.flowbite.accordion');
Route::view('/prototypes/flowbite/avatar', '/prototypes.flowbite.avatar');
Route::view('/prototypes/flowbite/carousel', '/prototypes.flowbite.carousel');
Route::view('/prototypes/flowbite/navbar', '/prototypes.flowbite.navbar');
Route::view('/prototypes/flowbite/login', '/prototypes.flowbite.login');

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
