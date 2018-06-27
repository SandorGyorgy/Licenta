<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
 
    public function images(){
        return $this->belongsTo('App\Post');

    }
    protected $fillable=[
        'image0','image1','image2','image3','image5','image6','image7',
    
    ];
    protected $hidden = [
        'created_at','updated_at','post_id' , 'id'
  ];
}
