<?php

namespace App;
use App\Location;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function location(){
        return $this->belongsTo('App\Location');

    }
    public function images(){
        return $this->hasOne('App\Images');

    }
    public function user(){
        return $this->belongsTo('App\User');
    }


    protected $fillable = [ 
    'title' ,'description' ,'dimension',
    'room_nr','price_month' ,'price_half_year','price_year' ,
];

}
