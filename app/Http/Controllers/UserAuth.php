<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuth extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $is_confirmed=1;
        $auth=Auth::attempt(compact('email', 'password','is_confirmed'));
        if($auth)
        return redirect('/dashboard');
        else
        return redirect('login')->with('message','Authentication Failed');
    }

    public function register(UserRequest $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'national_code'=>$request->national_code,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role
        ]);
        Auth::login($user);
        return redirect('/');
    }
}
