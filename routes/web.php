<?php

use Src\Route;

Route::add('go', [Controller\Site::class, 'index']);
Route::add('logout', [Controller\Site::class, 'logout']);
Route::add('hello', [Controller\Site::class, 'hello']);
Route::add('home', [Controller\Site::class, 'home']);
Route::add('login', [Controller\Site::class, 'login']);
Route::add('abonent', [Controller\Site::class, 'abonent']);
Route::add('rooms', [Controller\Site::class, 'rooms']);
Route::add('subdivision', [Controller\Site::class, 'subdivision']);
Route::add('phone', [Controller\Site::class, 'phone']);
Route::add('manager', [Controller\Site::class, 'manager']);
Route::add('manager_form', [Controller\Site::class, 'manager_form']);
