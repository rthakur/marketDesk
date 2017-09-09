<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/','DashboardContoller@index');

Route::group([ 'middleware'=>'auth'],function()
{

  Route::get('portfolio/future', 'PortfolioController@index');
  Route::resource('portfolio', 'PortfolioController');

  Route::get('getdata', 'DashboardContoller@getdata');
  Route::get('manage','ManagecompanyController@manage');
  Route::get('company/edit/{companyId}', 'ManagecompanyController@getEditCompany');
  Route::post('company/edit', 'ManagecompanyController@postEditCompany');

});

Auth::routes();
