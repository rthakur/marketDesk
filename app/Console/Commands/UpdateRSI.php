<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class UpdateRSI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rsi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update RSI';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
  		   $rsi = $this->getRSI('NSE:'.$company->nse_code, '60min');
  		   $company->rsi_60min = $rsi;
  		   $company->save();
         echo "RSI 60min - updated for ".$company->id.'- '.$company->nse_code.PHP_EOL;
	     }


      foreach($companyData as $company)
      {
        $rsi = $this->getRSI('NSE:'.$company->nse_code);
        $company->rsi = $rsi;
        $company->save();

        echo "RSI updated for ".$company->id.'- '.$company->nse_code.PHP_EOL;
     }



    }





    private function getRSI($symbol, $interval = 'daily')
    {
  	   $key = 'JQNNH8OYUYOFTW1W';
       sleep(10);
       try{
         $getData = file_get_contents('https://www.alphavantage.co/query?function=RSI&symbol='.$symbol.'&interval='.$interval.'&time_period=10&series_type=close&apikey='.$key);

         if($getData)
         {
                $getData = json_decode( $getData, true);

                if(isset($getData['Technical Analysis: RSI']))
                {
                  foreach($getData['Technical Analysis: RSI'] as $key => $value)
                  return isset($value['RSI'])? $value['RSI'] : 0;

                }else{
                  \Log::info($getData);
                }

          }

       }catch(\Exception $e){

         \Log::info($e->getMessage());
       }

	}

}
