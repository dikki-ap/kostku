<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            // Bisa juga menggunakan array
            "name" => "required|max:30", //  => ['required', 'max:30']
            "username" => "required|min:3|max:8|unique:users",
            "phone_number" => "required|min:11|max:13|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:3|max:16"
        ]);

        // Cara 1
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // Hash Password
        // Cara 2
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Jika yang diatas true, maka akan otomatis akan dijalankan yang bawah
        User::create($validatedData);

        // Flash Message (BISA DENGAN INI)
        // $request->session()->flash('success', 'Registration Successful');

        // Redirect (atau menggunakan with())
        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
