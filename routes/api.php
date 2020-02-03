<?php

Route::post('authenticate', 'AuthController@authenticate');
Route::post('unauthenticated', 'AuthController@unauthenticated');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');

Route::resource('users', 'UserController')->except('create', 'edit');
Route::resource('events', 'EventController')->except('create', 'edit');
