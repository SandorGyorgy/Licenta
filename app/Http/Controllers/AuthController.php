<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(){
        JWTAuth::invalidate();

        return response([
            'status' => 'success',
            'msg' => 'Logged out successfully'
        ] , 200);
    }

}
