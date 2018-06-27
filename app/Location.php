<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function post(){
        return $this-> hasOne('App\Post');
    }
    
    protected $fillable = [
        'address',
        'lng',
        'lat'
    ];

    protected $hidden = [
        'updated_at' , 'created_at'
    ];

}
