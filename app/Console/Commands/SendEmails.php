<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Mail;
use App\User;
use Carbon\Carbon;


class SendEmails extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'emails:send';

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
            $toWarn= Carbon::today()->subWeek();
            $notconfirmed_users = User::where('confirmed',0)->where('sent',0)->where('created_at','<=', $toWarn)->get();
//          dd($notconfirmed_users);
            User::where('confirmed',0)->where('sent',0)->where('created_at','<=', $toWarn)->update(['sent' => 1]);
           
            
            foreach($notconfirmed_users as $user)
            {
//                  var_dump($user['email']);
                 
                Mail::send('emails.warning', ['data' => $user]  , function($message) use ($user) {
                $message->to($user['email'])->from('monikaspasova1@gmail.com')->subject('Warning');
                });     
            }
     
	}

	
}



  