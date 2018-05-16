<?php

namespace App;
use App\Location;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function location(){
            return $this->hasOne('App\Location');

    }

    public function user(){
        return $this->belongsTo('App\User');
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
protected $hidden = [
      'created_at'
];
}
