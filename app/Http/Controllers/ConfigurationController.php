<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfigurationController extends Controller
{
    public function showConfiguration_profile(){
        $user = Auth::user();
        return view('configuration_profile', compact('user'));
    }

    public function showConfiguration_notifications(){
        $user = Auth::user();
        return view('configuration_notifications');
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('configuration.profile')
                         ->with('success', 'Datos actualizados correctamente.');
    }

    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|confirmed|min:6'
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta']);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('configuration.profile')->with('success', 'Contraseña actualizada correctamente.');
}

}
