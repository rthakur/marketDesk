<?php
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/','DashboardContoller@index');

Route::get('test', function(){
  $html = file_get_contents('https://finance.google.com/finance/historical?q=NSE:PNB&num=90'); //get the html returned from the following url

  $pokemon_doc = new DOMDocument();
  libxml_use_internal_errors(TRUE); //disable libxml errors
  if(!empty($html)){ //if any html is actually returned
    $pokemon_doc->loadHTML($html);
    libxml_clear_errors(); //remove errors for yucky html
    $pokemon_xpath = new DOMXPath($pokemon_doc);
    //get all the h2's with an id
      $classname="historical_price";
      $pokemon_row = $pokemon_xpath->query("//*[contains(@class, '$classname')] //tr");

      $trArray[] = ['date','open','high','low','close'];

      if($pokemon_row->length > 0)
      {

          foreach($pokemon_row as $row)
          {
              $cells = $row -> getElementsByTagName('td');
              $tdArray = [];
              foreach ($cells as $cell)
              {
                $tdArray[] = $cell->nodeValue;
              }
              if(count($tdArray))
              $trArray[] = $tdArray;
          }
      }


      echo '<pre>';
      print_r($trArray);

  }



});


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

  Route::get('portfolio/sold', 'PortfolioController@getsold');
  Route::get('portfolio/sold/create', 'PortfolioController@soldCreate');
  Route::post('portfolio/sold/store', 'PortfolioController@soldStore');

  Route::resource('portfolio', 'PortfolioController');





  Route::get('getdata', 'DashboardContoller@getdata');
  Route::get('manage','ManagecompanyController@manage');
  Route::get('company/edit/{companyId}', 'ManagecompanyController@getEditCompany');
  Route::post('company/edit', 'ManagecompanyController@postEditCompany');

});

Auth::routes();
