<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Request;
use Illuminate\Support\Facades\DB;
use App\User;
use DateTimeZone;
use Illuminate\Support\Facades\File;
 

class RegisterController extends Controller {
        
        public function register()      
        {
            $email = Request::get('email');          
            if (!empty($email)) {                
               // $count = DB::select('select count(id) as count from users where email = :email limit 1', ['email' => $email]);
                 $count = User::where('email', $email)->count();
                if ($count != 0) {                   
                     return Response::json(['msg'=>'false']);
                } else {
                   
                     return Response::json(['msg'=>'true']);
                }
            }
        }
        
        public function findTimezones()
        {    
            $country = Request::get('selected_country');
          //  $codes = DB::select('select code from countries where country = :country', ['country' => $country]);
            $code = DB::table('countries')->where('country', $country)->pluck('code');
            $time_zones=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $code); 
//            var_dump($time_zones);
            if(!empty($time_zones))
                {
                   return Response::json(['msg'=>true, 'timeZones'=>$time_zones]);
                }
             else
                {
                   return Response::json(['msg'=>false, 'timeZones'=>'']);
                }       
          
        }
         
        public function confirm($code)
        {         
                  
                    $count = User::where('confirmation_code', $code)->where('confirmed',0)->count();                   
                    if($count > 0)
                    {       
                        $dirName = uniqid('dir_', true);
//                        $dirName = rand(999, 9999);
                        $destinationPath = "/home/vagrant/Code/Laravel/storage/app/uploads/".$dirName;
                        File::makeDirectory($destinationPath);
                        User::where('confirmation_code', $code)->where('confirmed',0)->update(['confirmed' => 1, 'confirmation_code'=> null, 'filename' => $dirName]);
                        echo '<div>Your account has been activated, you can now login</div>';                      
                    }
                   else
                   {
                         echo '<div>Please sign up!</div>';
                   }  
            
           
        }
        
        
}
