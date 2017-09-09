<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/','DashboardContoller@index');

Route::group([ 'middleware'=>'auth'],function()
{

  Route::get('portfolio/future', 'PortfolioController@index');
  Route::post('portfolio/future', 'PortfolioController@index');

  Route::get('portfolio/remove/{id}', 'PortfolioController@destroy');
  Route::get('portfolio/future/create', 'PortfolioController@futureCreate');
  Route::post('portfolio/future/store', 'PortfolioController@futureStore');



  Route::resource('portfolio', 'PortfolioController');

  Route::get('getdata', 'DashboardContoller@getdata');
  Route::get('manage','ManagecompanyController@manage');
  Route::get('company/edit/{companyId}', 'ManagecompanyController@getEditCompany');
  Route::post('company/edit', 'ManagecompanyController@postEditCompany');

});

Auth::routes();
