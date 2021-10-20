<?php

namespace App\Http\Controllers\UserAuth;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    //Register User
    public function register(Request $request){
       
        //Validate Request
        $request->validate([
            'name' => ['required', 'String'],
            'email' => ['required', 'email', 'unique:users', 'String'],
            'phone' => ['required', 'String', 'max:11'],
            'password' => ['required', 'String', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'String', 'min:8'],
        ]);

        //Register User
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->token = Str::random(30);
        $user->verified = 0;

        $user->save();

        return response()->json('Congratulation, your registration was successful You can now login to your Dashboard');

        


        
    }

    public function signin(Request $request){

        //Validate Request
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:8']
        ]);


        //login user
        if(Auth::attempt($request->only('email', 'password'))){
            return response()->json(Auth::user(), 200);
        }


        //Throw error is process of login fails
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are not correct']
        ]);

        
    }

    public function logout(){
        
        //logout User
        Auth::logout();
    }
}
