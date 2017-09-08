<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/','DashboardContoller@index');

Route::get('getdata', 'DashboardContoller@getdata');

Route::get('manage','ManagecompanyController@manage');
Route::get('company/edit/{companyId}', 'ManagecompanyController@getEditCompany');
Route::post('company/edit', 'ManagecompanyController@postEditCompany');
Auth::routes();
