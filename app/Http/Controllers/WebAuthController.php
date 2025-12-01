<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class WebAuthController extends Controller
{
    
    //Mostrar Login
    public function showLogin(){
        return view('auth.login');
    }
    
    //Logout "Forzado" (Porque es el que ya se usa de cajon)
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

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
    //Envio de Formulario Login
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

    //DESACTIVACION
    //Mostrar Fomrulario de Desactivacion
    public function showDeactivateForm(){
        $roles = Role::all();
        return view("auth.deactivate", compact("roles"));
    }
    //Obtener Usuarios por Rol
    public function getUsersByRole($roleId){
        $users = User::where("role_id", $roleId)->where("active", true)
        ->get(["id", "name", "lastname"]);
        return response()->json($users);
    }

    //Desactivar solo para Admin
    public function webDeactivate(Request $request){
        $request->validate([
            "role_id" => "required",
            "user_id" => "required"
        ]);

        $user = User::find($request->user_id);

        if(!$user){
            return back()->withErrors(["error" => "Usuario no encontrado"]);
        }

        $user->active = false;
        $user->save();

        return redirect()->route("admin.home")->with("succes", "Usuario desactivado Correctamente");
    }
    //FIN DE DESACTIVACION

    //INICIO REACTIVACION
    public function showReactivateForm(){
        $roles = Role::all();
        return view ("auth.reactivate", compact("roles"));
    }

    public function getInactiveUsersByRole($roleId){
        $users = User::where("role_id", $roleId)->where("active", false)
        ->get(["id", "name", "lastname"]);
        return response()->json($users);   
    }

    public function webReactivate(Request $request){
        $request->validate([
            "role_id" => "required",
            "user_id" => "required"
        ]);

        $user = User::find($request->user_id);

        if(!$user){
            return back()->withErrors(["error" => "Usuarion no Encontrado"]);
        }

        $user->active = true;
        $user->save();

        return redirect()->route("admin.home")->with("succes", "Usuario Reactivado Correctamente");
    }

    //FIN REACTIVACION 
    
    //Mostrar Perfil (No funciona)
    public function profile(){
        return view('profile', ['user' => Auth::user()]);
    }

}
