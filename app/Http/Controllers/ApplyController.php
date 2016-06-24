<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Input;
use Validator;
use Redirect;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use HTML;
use App\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Artisan;

use App\Console\Commands\CheckUploads;
use App\Http\Controllers\PaypalController;


class ApplyController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload() {
      
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required',);
        $validator = Validator::make($file, $rules);      
        
        $payed_size=DB::table('payment')->where('user_id',Auth::user()->id)->pluck('size');
        
        if ($validator->fails()) {

            return Redirect::to('upload')->withInput()->withErrors($validator);
        } else {

            if (Input::file('image')->isValid()) {

                $destinationPath = 'uploads';

                $file = Input::file('image');
                
                $originalName = Input::file('image')->getClientOriginalName();
               
                
                $size = File::size($file);
                $dirSize = $this->sizeOfUsersDirectory();
                $newSize = $dirSize + $size;                         
                
                $has= DB::table('payment')->where('user_id', Auth::user()->id)->get();
              
                                
                if(($newSize <= 1000000) || (!empty($has) && $payed_size==10 && $newSize <= 10000000) || (!empty($has) && $payed_size==100 && $newSize <= 100000000))
                {                                     
                    $extension = $file->getClientOriginalExtension();

                    $userDirectory = Auth::user()->filename;

                    $dirName = DB::table('users')->where('filename', $userDirectory)->pluck('filename');

                    $fileName = strtoupper(md5(uniqid(rand(), true))) . ".$extension";
   

                    Input::file('image')->move("../storage/app/uploads/" . $dirName, $fileName);
                    DB::table('files')->insert(['user_id' =>  Auth::user()->id, 'user_filename' => $originalName, 'hashed_filename'=> $fileName]);
                    Session::flash('success', 'Upload successfully');

                    return Redirect::to('upload');
                     
                }
                else
                {                                                  
                    return Redirect::to('paymentForm'); 

                }
                
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');               
            }
        }
    }    
    
  
        public function isImage()
        {        
               $userDirectory = Auth::user()->filename;
               $dirName = DB::table('users')->where('filename', $userDirectory)->pluck('filename');
               $path = storage_path()."/app/uploads/".$dirName;
               $files = scandir($path);
               $img_files = array();
                for($i=2; $i<count($files); $i++)
                {
                  $img_files[$i] = $files[$i];
               }
                
                $userFilenames=array();
                foreach($img_files as $file)
                {
                      $userFilenames[]=DB::table('files')->where('user_id', Auth::user()->id)->where('hashed_filename',$file)->pluck('user_filename');                   
                }
                                      
               return view('pages.images', compact('userFilenames'));
        }
        
        public function makeProfile()
        {
             $username = Auth::user()->name;
             $userDirectory = Auth::user()->filename;
             $profileImage = Request::get('profileImage');
             $extension = File::extension($profileImage); 
             
             if (!Storage::exists('/uploads/profile/pic_'.$username.".$extension"))
             {
                 Storage::copy("/uploads/$userDirectory/".$profileImage, '/uploads/profile/pic_'.$username.".$extension");                     
                 return Response::json(['profileImage' => $profileImage]);
             }
             else
             {
                 Storage::delete('/uploads/profile/pic_'.$username.".$extension");
                 Storage::copy("/uploads/$userDirectory/".$profileImage, '/uploads/profile/pic_'.$username.".$extension");
                 return Response::json(['profileImage' => $profileImage]);
             }
        }
        
        
      public function sizeOfUsersDirectory()
        {             
             $userDirectory = Auth::user()->filename;
             
             $path = storage_path()."/app/uploads/$userDirectory";
             $files = scandir($path);            
             
             $dirSize=0;
             for($i=2; $i<count($files); $i++)
             {                               
                $size=Storage::size('/uploads/'.$userDirectory.'/'.$files[$i]);                       
                $dirSize += $size;               
             }
                      
             return $dirSize;
        }
           
        
        public function delete($id)
        {
            $file=DB::table('files')->where('user_id', Auth::user()->id)->where('id', $id)->pluck('hashed_filename');
            DB::table('files')->where('user_id', Auth::user()->id)->where('id', $id)->delete();          
            $userDirectory = Auth::user()->filename;
            $dirName = DB::table('users')->where('filename', $userDirectory)->pluck('filename');           
            Storage::delete('uploads/'.$dirName.'/'.$file);
            
            $path = storage_path()."/app/uploads/".$dirName;
            $files = scandir($path);
            $img_files = array();
             for($i=2; $i<count($files); $i++)
             {
               $img_files[$i] = $files[$i];
            }

             $userFilenames=array();
             foreach($img_files as $file)
             {
                   $userFilenames[]=DB::table('files')->where('user_id', Auth::user()->id)->where('hashed_filename',$file)->pluck('user_filename');                   
             }
             
            return view('pages.images', compact('userFilenames'));  
   
        }
        
 }

 
