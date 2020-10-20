<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\jobs\mail;
use Illuminate\Support\Facades\message;

class passController extends Controller
{
    public function login(Request $request){
        $login = $request->validate([
            'email'=>'required | string',
            'password'=>'required | string'
        ]);
    if(!Auth::attempt($login)){
        return response(['message'=>'Invalid credentials']);
    }
    $accessToken = Auth::User()->createToken('authToken')->accessToken;
    return response(['user'=> Auth::User(), 'access_token'=>$accessToken]);
}
public function index(){
    return User::all();
}
}

