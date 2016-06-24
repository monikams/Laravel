<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeleteNotConfirmed extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'notconfirmed:delete';

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
            $toDel= Carbon::today()->subWeeks(2);
            User::where('created_at','<=', $toDel)->where('confirmed', 0)->delete();
            //echo "\n";
            $this->info('Accounts deleted!');      
        }
}     
