<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\User;

class AuthController extends Controller
{
    function showSignup(){
        return view('Auth.signup');
    }

    function showSignin(){
        return view('Auth.signin');
    }

    function showAboutglobal(){
        return view('Auth.about');
    }

    function insertUser(SignupRequest $request){
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $request->session()->flash('success_message', 'User Registered Successfully');
        return redirect()->route('show-signin');
    }

    function verifyUser(Request $request){
        $user = User::where([
            'username' => $request->username,
            'password' => $request->password,
        ])->first();

        if($user){
            $request->session()->put('user', $user);
            return redirect(route('showHome'));
        }
        else {
            $request->session()->flash('error_message', 'User Not Found !!');
            return redirect()->route('show-signin');
        }
    }
}
