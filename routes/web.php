<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/','DashboardContoller@index');
// Route::get('import',function()
// {
//   $csv = array_map('str_getcsv', file('ind_nifty500list.csv'));
//   foreach($csv as $getCsv)
//   {
//     $companyData = \App\Company::where('nse_code', $getCsv[2])->first();
//     if($companyData)
//     {
//       $companyData->industry = $getCsv[1];
//       $companyData->nsc_500 = 1;
//       $companyData->save();
//     }
//   }
// });

Route::group([ 'middleware'=>'auth'],function()
{
  Route::get('portfolio/future', 'PortfolioController@index');
  Route::post('portfolio/future', 'PortfolioController@index');

  Route::get('portfolio/future/create', 'PortfolioController@futureCreate');
  Route::get('portfolio/remove/{id}', 'PortfolioController@destroy');

  Route::post('portfolio/future/store', 'PortfolioController@futureStore');
  Route::resource('portfolio', 'PortfolioController');

//  Route::get('getdata', 'DashboardContoller@getdata');
  Route::get('manage','ManagecompanyController@manage');
  Route::get('company/edit/{companyId}', 'ManagecompanyController@getEditCompany');
  Route::post('company/edit', 'ManagecompanyController@postEditCompany');

});

Auth::routes();
