<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	protected $fillable = ['title', 'body', 'published_at', 'user_id'];
        protected $dates = ['published_at']; 
         
        //za da se dobavi 4asa
        public function setPublishedAtAttribute($date)       
        {
            //$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
            $this->attributes['published_at'] = Carbon::parse($date);
        }
        
        public function scopePublished($query)
        {
            $query->where('published_at','<=', Carbon::now());
        }
        
        public function scopeUnpublished($query)
        {
            $query->where('published_at','>', Carbon::now());
        }
        
        //An article is owned by a user
        public function user()
        {
            return $this->belongsTo('App\User');
        }
        
        //get the tags, associated with the table
        public function tags()
        {
            return $this->belongsToMany('App\Tag');
        }
        
        public function setPasswordAttribute($password)
        {
            $this->attributes['password'] = mcrypt($password);      
        }
        
        //get a list of tag ids associated with this article
        public function getTagListAttribute()
        {
            return $this->tags->lists('id');
        }
}
