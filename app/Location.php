<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function location(){
        return $this-> belongsTo('App\Post');
    }
    
    protected $fillable = [
        'county',
        'neighborhood',
        'city',
        'address',
        'longitude',
        'latitude'
    ];

    protected $hidden = [
        'updated_at' , 'created_at'
    ];

}
