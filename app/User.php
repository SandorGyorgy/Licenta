<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

    protected $fillable = [
        'name', 'email', 'password', 'phone' ,'profile_picture'
    ];

    protected $hidden = [
        'password', 'updated_at'
    ];
}
