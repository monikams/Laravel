<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
        
        protected $redirectTo = '/articles';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
             
        public function getRegister()
        {        
          $countries = DB::table('countries')->select('country')->get();
  
           //  $country = 'Portugal';
           //$country = ['country'];
          // $codes = DB::select('select code from countries where country = :country', ['country' => $country]);
           //var_dump($codes);
//           $code = $codes[0];
//           $time_zones=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $code->code);
//           var_dump($time_zones);
//           return view('auth.register', compact('countries','time_zones'));
           return view('auth.register', compact('countries')); 
        }
        
      
        
        
}
