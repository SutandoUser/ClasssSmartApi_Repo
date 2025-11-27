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

    public function webLogin(Request $request){
        if(Auth::attempt($request->only("email","password"))){
            return back()->with("errors", "credenciales invalidas/incorrectas");
        }
        UserSession::create([
            "user_id" => Auth::id(),
            "device_id" => "web_device",
            "ip_address"=> $request->ip(),
            "login_at" => Carbon::now()
        ]);

        return redirect("/dashboard");
    }

    public function logout(Request $request){
        UserSession::where("user_id",Auth::id())
            ->latest()
            ->first()
            ->update(["logout_at" => Carbon::now()]);
        Auth::guard("web")->logout();
        return redirect("/login");
    }

    public function profile(){
        $user = Auth::user();
        return view("profile", ["user" => $user]);
    }
    ///sadsadasdsaddsadasdsdsadsd



    public function showLogin(){
        return view();
    }

    public function login(Request $request){
        $request->validate([
            "email" => "required|string",
            "password" => "required|string"
        ]);

        $credentials = $request->only("email", "password");
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user(User::with("role"));

            switch($user->id_role){
                case 1:

            }
        }
    }
}
