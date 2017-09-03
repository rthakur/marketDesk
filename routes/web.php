<?php
Route::get('/','DashboardContoller@index');
Route::get('auth/{provider}', 'AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');
Route::get('getdata', 'DashboardContoller@getdata');
Auth::routes();
