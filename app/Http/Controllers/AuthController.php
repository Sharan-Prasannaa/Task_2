<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }
    public function create(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect('/login')->with('status', 'Registration is successful!');
    }
    public function checkUser(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::User()->role === 'admin'){
                echo "Admin";die();
                //return redirect()->intended('/dashboard');
            }
            elseif(Auth::User()->role === 'customer'){
                echo "Customer";die();
                //return redirect()->intended('/customer');
            }
            else{
                return redirect('/login')->with('status','Email is not registerd');
            }
        }
        else{
            return redirect()->back()->with('status','Wrong Credentials Entered');
        }
    }
}
