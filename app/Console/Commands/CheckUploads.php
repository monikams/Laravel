<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class CheckUploads extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'check:uploads';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
	public function fire()
	{   
                $subMonth= Carbon::today()->subMonths(1);
                $subYear= Carbon::today()->subYears(1);              
                DB::table('payment')->where('created_at','<',$subYear)->delete();                
                DB::table('payment')->where('created_at','<',$subMonth)->delete();   
                $this->info("Uploads"); 
               
	}

	

}
