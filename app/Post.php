<?php

namespace App;
use App\Location;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function post(){
            return $this->hasOne('App\Location');

    }


    protected $fillable = [ 
    'user_id' ,
    'location_id' ,
    'title' ,
    'description' ,
    'room_nr',
    'price_month' ,
    'price_half_year',
    'price_year' 

];
}
