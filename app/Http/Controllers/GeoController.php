<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Response;
use App\User;
use Illuminate\Http\Request;

class GeoController extends Controller {
       
        public function __construct()
        {
            $this->middleware('auth');
            
        }
 
        public function get_users_countries()
        {
             $reg_countries = User::select('country')->distinct()->get();
//            $reg_countries = DB::table('users')->select('country')->distinct()->get();
         
             // masiv ot obekti
             if(!empty($reg_countries))
                {             
                    $countries = array();
                    foreach ($reg_countries as $country) {
                        $countries[] = $country->country;
                    }
                   
                    return view('charts/geocharts',  compact('countries'));
                }  
              else{
                    return view('charts/geocharts');
                }
        }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
