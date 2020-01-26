<?php

use Illuminate\Http\Request;

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::middleware('auth:api')->post('/logout', 'AuthController@logout');

Route::apiResource('books', 'BookController');
Route::middleware(['auth:api','isAuthor'])->post('/book/publish', 'BookController@publish');

Route::middleware('auth:api')->get('/user','AuthController@user');
