<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email'=>'required|unique:users',
            'password'=>'required|min:6|confirmed',
            'nama'=>'required|string'
        ]);
        $token = Str::random(25);
        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_token = hash('sha256',$token);
        $user->save();

        Mail::to($user->email)->send(new RegisterMail($user));

        return response()->json([
            'type'=>'success',
            'token'=>$user->api_token,
            'message'=>"Register Successfully"
        ],201);
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|exists:users',
            'password'=>'required|min:6'
        ]);
        
        $token = Str::random(25);
        $user = User::where('email',$request->email)->first();

        if(Hash::check($request->password, $user->password)){
            $user->forceFill([
                'api_token'=>hash('sha256',$token)
            ])->save();

            return response()->json([
                'type'=>'success',
                'message'=>'login successfully',
                'token'=>$token
            ],201);

        }else{
            return response()->json([
                'type'=>'error',
                'message'=>'wrong password'
            ],422);
        }
    }
}
