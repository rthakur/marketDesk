<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\UpdateRSI',
        'App\Console\Commands\UpdateDailyData',
        'App\Console\Commands\UpdateRSI1day'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

      if(!in_array(date('D'), ['Sun','Sat']))
      {

//\Log::info('Test');

        $hour = date('H');

        if( $hour >= 10 && $hour <= 16 )
        {

//	\Log::info('test');
  
        $schedule->command('update:rsi')
          ->hourly();

          $schedule->command('update:rsi-day')
          ->daily();

        }

      }

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
