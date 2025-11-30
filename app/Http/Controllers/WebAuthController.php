<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class WebAuthController extends Controller
{
    // Registro solo para admin
    public function webRegister(Request $request){
        $user = Auth::user();
        if(!$user || $user->role_id != 1){
            return redirect()->route('login')->withErrors(['error' => 'Solo admin puede registrar usuarios.']);
        }

        $request->validate([
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
            'cellphone' => 'nullable',
            "role_id" => "required"
        ]);

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cellphone' => $request->cellphone,
            "role_id" => $request->role_id
        ]);

        return redirect('/admin/home')->with('success', 'Usuario registrado por admin');
    }

    public function profile(){
        return view('profile', ['user' => Auth::user()]);
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            $request->session()->regenerate();
            $user = Auth::user();
            switch ($user->role_id) {
                case 1:
                    return redirect()->route('admin.home');
                case 2:
                    return redirect()->route('teacher.home');
                case 3:
                    return redirect()->route('student.home');
                case 4:
                    return redirect()->route('parent.home');
                default:
                    return redirect()->route('login');
    }
        }

        return back()->withErrors(['error'=>'Credenciales incorrectas']);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
