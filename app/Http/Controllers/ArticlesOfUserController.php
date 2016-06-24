<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ArticlesOfUserController extends Controller {

         public function __construct()
        {
            $this->middleware('auth');
            
        }

        public function articles_of_user()
        {
             $user_ids = Article::select('user_id')->distinct()->get();
//             $user_ids = DB::table('articles')->select('user_id')->distinct()->get();
//            var_dump($user_ids);
             
              if(!empty($user_ids))
                {       
                    $username = array();
                    $count_per_user = array();
                    $name = array();
                    $count = array();
                    
                    foreach ($user_ids as $user_id) {
                      $it = $user_id->user_id;
                      $username[$it] = DB::table('users')->join('articles', 'users.id', '=', 'articles.user_id')->select('users.name')->where('users.id', $it)->distinct()->get();                   
                      $count_per_user[$it] = DB::table('users')->join('articles', 'users.id', '=', 'articles.user_id')->select(DB::raw('count(articles.id) as count'))->where('users.id', $it)->get();     
                 
                    }
                    
                    foreach($count_per_user as $c)
                    {
                        foreach($c as $cu)
                        {
                            $count[] = $cu->count;
                        }
                    }
                    
                     foreach($username as $u)
                    {
                        foreach($u as $un)
                        {
                            $name[] = $un->name;
                        }
                    }
                     
                    $info=array_combine($name, $count);         
                    
                   return view('charts/userchart', compact('info'));
                }  
                else
                {
                     return view('charts/userchart');
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
