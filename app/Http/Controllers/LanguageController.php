<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller {
    //setvam ezika
//    public function choose(Request $request)
//    {
//        $query = $request->input('locale'); 
//        
//        if(\Session::has('locale'))
//        {
//            \Session::set('locale', $query);    
//           dd(\Session::get('locale'));
//        }
//    }
    
     public function choose($location)
    {
        if(Session::has('locale'))
        {
            Session::set('locale', $location);    
        }
              
        return \Redirect::back();
    }


}
