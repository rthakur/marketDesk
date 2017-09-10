<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateRSI1day extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rsi-day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $companyData = Company::where('nse_code', '!=','')->get();


       foreach($companyData as $company)
       {
  		   $rsi = $this->getRSI($company, '60min');

         echo "RSI 60min - updated for ".$company->id.'- '.$company->nse_code.PHP_EOL;
	     }


      foreach($companyData as $company)
      {
        $rsi = $this->getRSI($company,'daily');

        echo "RSI updated for ".$company->id.'- '.$company->nse_code.PHP_EOL;
     }



    }





    private function getRSI($company, $interval = 'daily')
    {
       $key = 'JQNNH8OYUYOFTW1W';
       $symbol = "NSE:".$company->nse_code;
        try{
            	$url = 'https://www.alphavantage.co/query?function=RSI&symbol='.$symbol.'&interval='.$interval.'&time_period=10&series_type=close&apikey='.$key;
            	$getData = file_get_contents($url);
            	$getData = json_decode( $getData, true);

            	if(empty(count($getData)))
              {
             	    $getData = file_get_contents(str_replace('NSE:','',$url));
               	  $getData = json_decode( $getData, true);
            	}

              if(isset($getData['Technical Analysis: RSI']))
             	 {

                  foreach($getData['Technical Analysis: RSI'] as $key => $value)
                      {
                      $company->rsi = $value['RSI'];
                      $company->save();
                      return "Sucess";
                      }

              }else{
                \Log::info($getData);
              }

           }catch(\Exception $e){
             \Log::info($e->getMessage());
           }
  }


}
