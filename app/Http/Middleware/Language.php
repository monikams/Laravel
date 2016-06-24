<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{   
            //\App::setLocale('en');
            //var_dump(\Session::get('locale'));die;
            
            if(!\Session::has('locale'))
            {
               
               \Session::set('locale', \Config::get('app.locale'));
                 
            }
            
            \App::setLocale(\Session::get('locale'));
            
            return $next($request);
	}

}
