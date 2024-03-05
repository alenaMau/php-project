<?php

use Src\Route;

// Route::add('go', [Controller\Site::class, 'index']);
Route::add('GET','/logout', [Controller\Site::class, 'logout']);
Route::add('GET','/hello', [Controller\Site::class, 'hello']);
Route::add('GET','/home', [Controller\Site::class, 'home']);
Route::add(['GET', 'POST'],'/login', [Controller\Site::class, 'login']);
Route::add(['GET', 'POST'],'/abonent', [Controller\Site::class, 'abonent']);
Route::add(['GET', 'POST'],'/rooms', [Controller\Site::class, 'rooms']);
Route::add(['GET', 'POST'],'/subdivision', [Controller\Site::class, 'subdivision']);
Route::add(['GET', 'POST'],'/phone', [Controller\Site::class, 'phone']);
Route::add('GET','/manager', [Controller\Site::class, 'manager']);
Route::add(['GET', 'POST'],'/manager_form', [Controller\Site::class, 'manager_form']);
Route::add('GET','/attach_number', [Controller\Site::class, 'attach_number']);
Route::add('GET','/abonent_all', [Controller\Site::class, 'abonent_all']);
Route::add(['GET', 'POST'],'/search', [Controller\Site::class, 'search']);
Route::add('GET','/abonent_list', [Controller\Site::class, 'abonent_list']);
Route::add('GET','/room_all', [Controller\Site::class, 'room_all']);
