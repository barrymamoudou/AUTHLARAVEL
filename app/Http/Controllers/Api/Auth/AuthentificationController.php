<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|max:255',
            'password'=>'required'

        ]);
        $login=$request->only('email','password');
        if(!Auth::attempt($login)){

            return response(['message'=>'Invalid'],401);
        }

        $user=Auth::User();

        $token=$user->createToken($user->name);

        return response([
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'created_at'=>$user->created_at,
            'update_at'=>$user->update_at,
            'token'=>$token->accessToken,
            'token_expires_at'=>$token->token->expires_at
        ],200);
    }
}
