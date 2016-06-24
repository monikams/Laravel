<?php

namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Registrar implements RegistrarContract {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:60',
                    'email' => 'required|email|max:60|unique:users',
                    'password' => 'required|confirmed|min:6',
                    'country' => 'required',
                    'time_zone' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data) {
                  
         $confirmation_code = str_random(30);       
         $user= User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country' => $data['country'],
            'time_zone' => $data['time_zone'],
            'confirmation_code' => $confirmation_code
         ]);
         
          $this->sendEmail($user);
          return $user;
    }

    public function sendEmail($user) {
        
        Mail::send(array('html' => 'emails.message'), ['data' => $user]  , function($message) use ($user) {
        $message->to($user['email'], 'monika')->from('monikaspasova1@gmail.com')->subject('Welcome');
        });
                                                             
    }
    
//    public function sendWarningEmail($user) {
//        
//        Mail::send('emails.warning', ['data' => $user]  , function($message) use ($user) {
//        $message->to($user['email'], 'monika')->from('monikaspasova1@gmail.com')->subject('Warning');
//        });
//                                                             
//    }

}



    