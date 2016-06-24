<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
                'App\Console\Commands\DeleteNotConfirmed',
                'App\Console\Commands\SendEmails',
                'App\Console\Commands\CheckUploads'
	];
	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{        
             $schedule->command('notconfirmed:delete')->dailyAt('00:10');
         //    $schedule->command('emails:send')->dailyAt('00:10');
             $schedule->command('notconfirmed:delete')->dailyAt('00:10');
             $schedule->command('check:uploads')->dailyAt('07:06');
	}

}
