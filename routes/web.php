<?php

Route::get('/', 'PageController@index')->name('index');
Route::get('/login', 'PageController@login')->name('login');
Route::get('/logout', 'PageController@logout')->name('logout');
Route::get('/privacy', 'PageController@privacy')->name('privacy');

Route::get('/auth', 'AuthController@login')->name('auth.login');
Route::get('/auth/failed', 'AuthController@failed')->name('auth.failed');
Route::get('/auth/callback', 'AuthController@authentication')->name('auth.callback');
