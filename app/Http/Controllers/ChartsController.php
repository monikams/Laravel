<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class ChartsController extends Controller {
    
      public function __construct()
        {
            $this->middleware('auth');
        }

    public function articles_per_day() {

        $period = $this->getRequest();
        $start = $period[0];
        $final = $period[1];

        $startDate = substr("$start", 0, 10);
        $finalDate = substr("$final", 0, 10);

        $date = DB::table('articles')->where('created_at', '>=', $startDate)->where('created_at', '<=', $finalDate)->select('created_at')->get();

        $days = array();
        foreach ($date as $d) {
            $days[] = $d->created_at;
        }

        $new_days = array();
        foreach ($days as $day) {
            array_push($new_days, substr($day, 0, 10));
        }

        $unique_days = array_unique($new_days);

        $articles = array();

        foreach ($unique_days as $unique_day) {
            $articles[] = DB::table('articles')->where('created_at', 'like', $unique_day . '%')->count();
        }

        $info = array_combine($unique_days, $articles);

        if (!empty($info)) {
            return Response::json(['msg' => true, 'info' => $info]);
        } else {
            return Response::json(['msg' => false, 'info' => '']);
        }
    }

    public function getRequest() {
        $start = Request::get('start_date');
        $final = Request::get('final_date');

        if (!empty($start) && !empty($final) && $start <= $final) {
            $startDate = Carbon::createFromFormat('Y-m-d', $start);
            $finalDate = Carbon::createFromFormat('Y-m-d', $final);
        } else {
            $finalDate = Carbon::today();
            $startDate = Carbon::today()->subWeeks(2);
        }

        $period = array($startDate, $finalDate);
        return $period;
    }


    private function getUserCountries() {
        $reg_countries = User::select('country')->distinct()->get();
//            $reg_countries = DB::table('users')->select('country')->distinct()->get();
        // masiv ot obekti        
        $countries = array();
        if (!empty($reg_countries)) {

            foreach ($reg_countries as $country) {
                $countries[] = $country->country;
            }
        }
        
        $users_per_country = [];
        
        foreach($countries as $country)
        {
              $users_per_country [] = User::where('country', $country)->count();
              
        }
         
        $users_countries = array_combine($countries, $users_per_country);
        
        return  $users_countries;
    }

    public function articles_of_user() {
        $user_ids = Article::select('user_id')->distinct()->get();

            $username = array();
            $count_per_user = array();
            $name = array();
            $count = array();

            foreach ($user_ids as $user_id) {
                $it = $user_id->user_id;
                $username[$it] = DB::table('users')->join('articles', 'users.id', '=', 'articles.user_id')->select('users.name')->where('users.id', $it)->distinct()->get();
                $count_per_user[$it] = DB::table('users')->join('articles', 'users.id', '=', 'articles.user_id')->select(DB::raw('count(articles.id) as count'))->where('users.id', $it)->get();
            }

            foreach ($count_per_user as $c) {
                foreach ($c as $cu) {
                    $count[] = $cu->count;
                }
            }

            foreach ($username as $u) {
                foreach ($u as $un) {
                    $name[] = $un->name;
                }
            }

            $info = array_combine($name, $count);

             return $info; 
    } 

    public function index() {
         $finalDate = Carbon::today();
         $startDate = Carbon::today()->subWeeks(2);
         $countries= $this->getUserCountries();
         $info = $this->articles_of_user();
         
         if(Auth::check()&& isset(Auth::user()->email) && Auth::user()->email=="monikaspasova1@gmail.com")
         {
            return view('charts/charts', compact('startDate', 'finalDate','countries','info'));
         }
         
         var_dump(1);
         return redirect("../");   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
