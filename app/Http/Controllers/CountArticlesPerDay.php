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


class CountArticlesPerDay extends Controller {
    
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
//        var_dump($info);
        
                 if(!empty($info))
                 {
                      return Response::json(['msg'=>true, 'info'=>$info]);
                 }
                 else
                 {
                      return Response::json(['msg'=>false, 'info'=>'']);
                    }

//        return view('charts/articles_per_day', compact('info'));
    }
    
    public function getRequest()
    {
        $start = Request::get('start_date');
        $final = Request::get('final_date');
//        var_dump($start);
                          
        if (!empty($start) && !empty($final) && $start <= $final) {
            $startDate = Carbon::createFromFormat('Y-m-d', $start);       
            $finalDate = Carbon::createFromFormat('Y-m-d', $final);
        } else {
            $finalDate = Carbon::today();
            $startDate = Carbon::today()->subWeeks(2);
        }
        
        $period = array($startDate, $finalDate);
//        var_dump($period);
         return $period;
    }
    
    public  function getPeriod()
    {        
        $period = $this->getRequest();  
        $start = $period[0];
        $final = $period[1];
        $startDate = substr("$start", 0, 10);
        $finalDate = substr("$final", 0, 10);
                    
        return view('charts/articles_per_day', compact('startDate', 'finalDate')); 
        
    }
    
   

    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
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
