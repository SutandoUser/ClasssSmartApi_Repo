<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserSession;
use Carbon\Carbon;


class WebAuthController extends Controller
{
    public function webRegister(Request $request){
    $request->validate([
        "name" => "required|min:3",
        "lastname" => "required|min:3",
        "email"=> "required|email|unique:users",
        "password"=> "required|min:4",
        "cellphone"=> "nullable",
        "active" => "required|boolean",
    ]);
    $user = User::create([
        "name" => $request->name,
        "lastname" => $request->lastname,
        "email" => $request->email,
        "password" => Hash::make($request->password),
        "cellphone" => $request->cellphone,
        "active" => $request->active
    ]);
    if($user){
        return redirect("/login")-> with("success","Registro exitoso, todo en orden apa");
    }
    return back()->withErrors(["error"=>"Error en el registro, intenta de nuevo"]);
    }

    public function profile(){
        $user = Auth::user();
        return view("profile", ["user" => $user]);
    }

   
    ///sadsadasdsaddsadasdsdsadsd



    public function showLogin(){
        return view("auth.login");
    }

    public function login(Request $request){
        $request->validate([
            "email" => "required|string",
            "password" => "required|string"
        ]);

        $credentials = $request->only("email", "password");
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            switch($user->role_id){
                //caso admin
                case 1: 
                    return redirect()->route("admin.home");
                 //caso teacher
                case 2:
                    return redirect()->route("teacher.home");
                //caso student
                case 3:
                    return redirect()->route("student.home");
                //caso parent
                case 4:
                    return redirect()->route("parent.home");
                default:
                    return redirect()->intended("auth.login");
            }
        }else{
        return back()->withErrors([
            "error"=> "Credenciales incorrectas"
        ]);
        }
    }

    public function logout(Request $request){
        Auth::guard("web")->logout();
        return redirect("/login");
    }
}
