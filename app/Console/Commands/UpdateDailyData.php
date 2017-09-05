<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class UpdateDailyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $rsi = $this->geCompanyData($company);

    }



  function geCompanyData($company)
    {
        $key = 'JQNNH8OYUYOFTW1W';
        $symbol = 'NSE:'.$company->nse_code;
        $getData = @file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$symbol.'&apikey='.$key);

       if($getData)
       {
         $getData = json_decode( $getData, true);

         if(isset($getData['Time Series (Daily)']))
         foreach($getData['Time Series (Daily)'] as $key => $data)
         {

            $open = isset($data['1. open'])? $data['1. open'] : 0;
            $high = isset($data['2. high'])? $data['2. high'] : 0;
            $low = isset($data['3. low'])? $data['3. low'] : 0;
            $close = isset($data['4. close'])? $data['4. close'] : 0;
            $volume = isset($data['5. volume'])? $data['5. volume'] : 0;
            $change = $open - $close;

            $company =  Company::find($company->id);
            $company->open = $open;
            $company->high = $high;
            $company->low = $low;
            $company->close = $close;
            $company->volume = $volume;
            $company->change = $change;
            $company->save();
            return 'success';
         }

       }

     }
}
