<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

        protected $fillable = ['name'];
        
	public function articles()
        {
            //Get the articles associated with the given tag
            return $this->belongsToMany('App\Article')->withTimestamps();
        }

}
