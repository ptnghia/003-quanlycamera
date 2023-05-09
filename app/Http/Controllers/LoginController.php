<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){
        return view('admin.login');
    }

    public function login (Request $request){
        $credentials = $request->validate([
            'username'  => ['required'],
            'password'  => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Thông tin đăng nhập không đúng.',
        ]);
    }

    public function logout (Request $request){
        
    }
}
