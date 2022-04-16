<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            "email" => "required|email:dns",
            "password" => "required"
        ]);

        // Cek informasi yang ditampung $credentials
        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); // Untuk menghindari 'session fixation'

            // Redirect
            return redirect()->intended('/');
        }else{
            return back()->with('loginError', 'Login Gagal');
        }
        
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
