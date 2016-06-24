<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexInfo()
	{
                $old_name =  Auth::user()->name;
                $old_country = Auth::user()->country;
                $old_time_zone = Auth::user()->time_zone;
                $countries = DB::table('countries')->select('country')->get();
               
            	return view('account.updateAccount', compact('old_name','countries','old_country','old_time_zone'));
	}
        
        public function indexPassword()
	{                    
                $password = Auth::user()->password;
            	return view('account.updatePassword', compact('password'));
	}

        public function indexEmail()
	{          
                $email = Auth::user()->email;
            	return view('account.updateEmail', compact('email'));
	}

        
	public function updateInfo()
	{
            $id = Auth::user()->id;
            $new_name=Input::get('name');
            $new_country=Input::get('country');
            $new_time_zone=Input::get('time_zone');                 
            DB::table('users')->where('id', $id)->update(['name'=> $new_name,'country'=> $new_country, 'time_zone'=>$new_time_zone]);
            return redirect('../');
	}
        
        public function updatePassword()
        {
             $id = Auth::user()->id;
             $oldPassword=Input::get('old_password');
             $newPassword=Input::get('new_password');
             $confirmNewPassword=Input::get('confirm_new_password');  
             $userPassword = Auth::user()->password;
            
             if(Hash::check($oldPassword,$userPassword) && $newPassword==$confirmNewPassword)
             {
              $hashedNewPassword = bcrypt($newPassword);
             
              DB::table('users')->where('id', $id)->update(['password'=> $hashedNewPassword]);
             }
            
             return redirect('../');
        }
        
        public function updateEmail()
        {   
            $id = Auth::user()->id;
            $password = Input::get('password');
            $userPassword = Auth::user()->password;
           
            $email = Input::get('email');         
            
             if(Hash::check($password,$userPassword))
             {             
                DB::table('users')->where('id', $id)->update(['email'=> $email]);
             }
             
             return redirect('../');   
        }
                
}
