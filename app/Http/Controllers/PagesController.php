<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function about()
    {
       $name='Monika Spasova <span style="color: red">!!!</span>';
       $data=[];
       $data['first']='Monika';
       $data['last']='Spasova';    
       $firstname='Monika';
       
       
       return view('about')->with('firstname',$firstname);
       //return view('about')->with($data);
       //return view('about', compact('firstname'));
       /*return view('about')->with(['first' => 'Monika'
                                 'last' => 'Spasova'          
                               ]);*/
    }

   
}
