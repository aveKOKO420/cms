<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    // mutator
    public function setPostImageAttribute($value){

//        dd($this->attributes);
        $this->attributes['post_image'] = $value;

    }

    //accessor

    public function getPostImageAttribute($value) {



//        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
//
//            return $value;
//        }
        return asset('storage/' . $value);
    }

    // accessor for post slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }



}
