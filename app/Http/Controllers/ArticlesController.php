<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticlesController extends Controller {
        //create a new article controller instance
	//used for people entering like guests, see Kernel.php
        public function __construct()
        {
            $this->middleware('auth', ['only' => 'create']);
            //another way:
            //$this->middleware('auth', ['except' => 'index']);
            
        }
        
        public function index()
        {
           // return  \Auth::user()->name;
            $articles = Article::latest('published_at')->published()->get();
            return view('articles.index', compact('articles'));
        }
        
        //public function show($id)
        public function show(Article $article)
        {
           //$article = Article::findOrFail($id);
            //dd($article->published_at);
            return view('articles.show', compact('article'));
          
        }
        
        public function create()
        {
//            if(Auth::guest())
//            {
//                return redirect('articles');
//            }
            $tags = Tag::lists('name', 'id');
            return view('articles.create', compact('tags'));
        }      
          
         public function store(ArticleRequest $request)
        {
            //$input['published_at'] = Carbon::now();       
            //Article::create(Request::all());
//                            
//            Article::create($request->all());
//            return redirect('articles');
            
//             za da se ima predvid user_id
               //$article = new Article($request->all());
               // dd($article);
        
            //Auth::user()->articles;
           //Auth::user()->articles()->save($article);
           //return redirect('articles');
             
             
             
             //session()->flash('flash_message', 'Your article has been created');
            // session()->flash('flash_message_important', true);
             //\Session::get('flash_message', 'Your article has been created');
             //\Session::put('flash_message', 'Your article has been created'); - to show message also after refresh
             //return redirect('articles')->with(['flash_message' => 'Your article has been created', 'flash_message_important' => true]);
              
             
             //$tags = $request->input('tags');
             //slagame indexi na masiva $tags
             //$articles->tags()->attach([1,2,3,4]);
             
             
             $this->createArticle($request);
             //za da izpolzvam dolnia red : composer require laracasts/flash - instalira se paket i se dobavia v config/app.php  
             flash()->success('Your article has been created'); // green message
             //flash()->overlay('Your article has been created', 'Good job'); triabva da promenia i js-a v config/app
             return redirect('articles');
             
//             $request = $request->all();
//             $request['user_id']=Auth::id();
//             Article::create($request->all());
//             return redirect('articles');
        }
        
        //public function edit($id)
        public function edit(Article $article)
        {
            //$article = Article::findOrFail($id);
            //var_dump($article);
            $tags = Tag::lists('name', 'id');
            return view('articles.edit', compact('article','tags'));
        }
        
       //public function update($id, ArticleRequest $request)
        public function update(Article $article, ArticleRequest $request)
        {
            //$article = Article::findOrFail($id);
            //var_dump($article);
            
            $article->update($request->all());
            $this->syncTags($article, $request->input('tag_list'));
            //$article->tags()->attach($request->input('tag_list')); -- adds new rows to the table
            // $article->tags()->detach($request->input('tag_list')); --delete rows from the table
            // $article->tags()->sync($request->input('tag_list'));   --remove the old row and add the new (updated)
            return redirect('articles');
        }
        
        private function syncTags(Article $article, array $tags)
        {
            $article->tags()->sync($tags);
        }
        
        //save a new article
        private function createArticle(ArticleRequest $request)
        {
            $article = Auth::user()->articles()->create($request->all());
            $this->syncTags($article, $request->input('tag_list'));
            return $article;
        }
}
