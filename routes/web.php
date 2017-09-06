<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/','DashboardContoller@index');
Route::get('manage','DashboardContoller@manage');
Route::get('getdata', 'DashboardContoller@getdata');

Route::get('company/edit/{companyId}', 'DashboardContoller@getEditCompany');
Route::post('company/edit', 'DashboardContoller@postEditCompany');


Auth::routes();
