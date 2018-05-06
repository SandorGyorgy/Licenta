<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class APIRegisterController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request-> all(),[
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|max:10'
           
        ]);

        if($validator -> fails()){
            return response()-> json($validator -> errors());
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'phone' => $request->get('phone')

        ]);

        $user = User::first();
        $token = JWTAuth::fromUser($user);

        return response()->json(['token' => $token]);

    }




}
