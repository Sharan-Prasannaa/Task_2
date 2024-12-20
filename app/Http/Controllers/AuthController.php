<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Log::info('User Created:', $user->toArray());

            return redirect('/login')->with('status', 'Registration is successful!');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
