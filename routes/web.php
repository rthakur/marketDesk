<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/','DashboardContoller@index');
Route::get('getdata', 'DashboardContoller@getdata');
Auth::routes();
