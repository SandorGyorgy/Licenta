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

        $verify = User::where('email' , $request->email)->get();
     
       
    if(sizeof($verify) == 1){
        return response()->json('email already exists' , 500);
}else{
    $profilePicture = $request->profilePicture;
    $extention = $profilePicture->getClientOriginalExtension();
    $imageName = time().str_random().".".$extention;
    $destinationPath = public_path('avatars');
    $profilePicture->move($destinationPath , $imageName);
    $path = "http://licenta.test/avatars/".$imageName;

    User::create([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => bcrypt($request->get('password')),
        'phone' => $request->get('phone'),
        'profile_picture' => $path

    ]);
    return response()->json('success', 200);
 
}
        

        

       

    }




}
