<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Spatie\Permission\Traits\HasRoles;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

use App\Models\User;


class UserController extends Controller
{
    // use HasRoles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */      
    public function index()
    {
        $users=User::all();
        return ['user'=>$users];
        
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'name'=>'required|min:2|max:100',
            'email'=>'email|unique:users',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:password'

        ]);


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
            'user_type'=>$request->user_type,
            'adresse'=>$request->adresse

        ]);

        // return response()->json([
        //     'message'=>'Registration',
        //     'data'->$user
        // ],200);

         return ['user'=>$user];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::findOrFail($id);
        return ['user'=>$user];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user= User::findOrFail($id);
        $user->update($request->all());
        return ['user'=>$user];
        }
   


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        return ['status'=>'user deleted successfully'];

        // return $user::destroy($id);
    }
}
