<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Hash;

class AuthController extends Controller
{

    //register
    public function register(Request $request){
  
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:2|max:100',
            'email'=>'email|unique:users',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:password'

        ]);

        // if ($validator->fails()) {
        //     return Reponse()->json([
        //         'message'=>'validations fails',
        //         'errors'=>$validator->errors()
        //     ],422);
        // }


        if ($validator->fails()) {
            return response()->json([
                'message'=>'validations fails',
                'errors'=>$validator->errors()
                ],422);
             
        }

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'number'=>$request->number,
            'adresse'=>$request->adresse,
            'user_type'=>$request->user_type,

        ]);

        return response()->json([
            'message'=>'Registration',
            'data'=>$user
        ],200);
    }
//login
    public function login(Request $request){

        $validator=Validator::make($request->all(),[
            'email'=>'email|required',
            'password'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'=>'login fails',
                'errors'=>$validator->errors()
                ],422);
        }

        $user=User::where('email',$request->email)->first();

        if ($user) {
            if (Hash::check($request->password,$user->password)) {
                $token=$user->createToken('auth-token')->plainTextToken;
                $cookie=cookie('jwt',$token,60*24);
                // return response()->json([
                //     'message'=>'login successful',
                //     'token'=>$token,
                //     'user'=>$user
                // ],200);

            return ($this->respondWithToken($token))->withCookie($cookie);
                
            }
           
            
        }
        else {
            return response()->json([
                'message'=>'identifiants incorrects',
            ],400);
        }

    }
//================================
//user
public function user(Request $request){
    return response()->json([
        'message'=>'user successful fetch', 
        'user'=>$request->user()
    ],200);
}

public function logout(Request $request){
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message'=>'user successful logout'
    ],200);


}

protected function respondWithToken($token)
{
    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60,
    ]);
}
}
