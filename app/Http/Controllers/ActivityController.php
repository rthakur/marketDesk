<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockActivity;
use App\Company;

class ActivityController extends Controller
{
    function calculateActivity()
    {
      $testCampany = ['62','91'];
      $companyData = Company::where('nse_code', '!=','')->whereIn('id',$testCampany)->where('nsc_500', 1)->get();

      foreach($companyData as $company){

        $html = file_get_contents('https://finance.google.com/finance/historical?q=NSE:'.$company->nse_code.'&num=90'); //get the html returned from the following url
        $pokemon_doc = new \DOMDocument();
        libxml_use_internal_errors(TRUE); //disable libxml errors
        if(!empty($html)){ //if any html is actually returned
          $pokemon_doc->loadHTML($html);
          libxml_clear_errors(); //remove errors for yucky html
          $pokemon_xpath = new \DOMXPath($pokemon_doc);
          //get all the h2's with an id
            $classname="historical_price";
            $pokemon_row = $pokemon_xpath->query("//*[contains(@class, '$classname')] //tr");

            $trArray[] = ['date','open','high','low','close'];

            $openArray = [];
            $highArray = [];
            $lowArray = [];
            $closeArray = [];
            $volumnArray = [];

            if($pokemon_row->length > 0)
            {

                foreach($pokemon_row as $row)
                {
                    $cells = $row -> getElementsByTagName('td');
                    $tdArray = [];

                    foreach ($cells as $key => $cell)
                    {

                    $cellValue =  str_replace(',', '', $cell->nodeValue);

                      if($key == '1')
                      array_push($openArray, $cellValue);

                      if($key == '2')
                      array_push($highArray, $cellValue);

                      if($key == '3')
                      array_push($lowArray, $cellValue);

                      if($key == '4')
                      array_push($closeArray, $cellValue);

                      if($key == '5')
                      array_push($volumnArray, $cellValue);

                      $tdArray[] = $cell->nodeValue;
                    }

                    if(count($tdArray))
                    $trArray[] = $tdArray;
                }
            }


          $StockActivity =  StockActivity::firstOrNew(['company_id' => $company->id]);

          $StockActivity->save();
          $StockActivity->open_7days =  $this->calculateAvg($openArray, 7);
          $StockActivity->open_2weeks =  $this->calculateAvg($openArray, 14);
          $StockActivity->open_1month =  $this->calculateAvg($openArray, 30);
          $StockActivity->open_2months =  $this->calculateAvg($openArray, 60);
          $StockActivity->open_3months =  $this->calculateAvg($openArray, 90);

          $StockActivity->high_7days =  $this->calculateAvg($highArray, 7);
          $StockActivity->high_2weeks =  $this->calculateAvg($highArray, 14);
          $StockActivity->high_1month =  $this->calculateAvg($highArray, 30);
          $StockActivity->high_2months =  $this->calculateAvg($highArray, 60);
          $StockActivity->high_3months =  $this->calculateAvg($highArray, 90);

          $StockActivity->close_7days =  $this->calculateAvg($closeArray, 7);
          $StockActivity->close_2weeks =  $this->calculateAvg($closeArray, 14);
          $StockActivity->close_1month =  $this->calculateAvg($closeArray, 30);
          $StockActivity->close_2months =  $this->calculateAvg($closeArray, 60);
          $StockActivity->close_3months =  $this->calculateAvg($closeArray, 90);


          $StockActivity->low_7days =  $this->calculateAvg($lowArray, 7);
          $StockActivity->low_2weeks =  $this->calculateAvg($lowArray, 14);
          $StockActivity->low_1month =  $this->calculateAvg($lowArray, 30);
          $StockActivity->low_2months =  $this->calculateAvg($lowArray, 60);
          $StockActivity->low_3months =  $this->calculateAvg($lowArray, 90);


          $StockActivity->vol_7days =  $this->calculateAvg($volumnArray, 7);
          $StockActivity->vol_2weeks =  $this->calculateAvg($volumnArray, 14);
          $StockActivity->vol_1month =  $this->calculateAvg($volumnArray, 30);
          $StockActivity->vol_2months =  $this->calculateAvg($volumnArray, 60);
          $StockActivity->vol_3months =  $this->calculateAvg($volumnArray, 90);

          $StockActivity->save();

        }
      }

    }



    private function calculateAvg($array, $days)
    {

      if(!count($array)) return 0;

      $start = ($days == 7)? 0 : $days - 7;
      $array = array_slice($array, $start, $days);




      return number_format(array_sum($array)/count($array), 2,'.','');

    }


}
