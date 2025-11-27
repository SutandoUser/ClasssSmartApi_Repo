<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function readAll(){
        return response()->json(User::with("role")->get());
    }

     public function create(){
        $data = request()->validate([
            "name" => "required|min:3",
            "lastname" => "required|min:3",
            "email"=> "required|email|unique:users",
            "password"=> "required|min:4",
            "cellphone"=> "nullable",
            "active" => "required",
            "id_role" => "required"
        ]);

        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);
        return response()->json($user);
    }

    public function readOne($id){
        return response()->json(User::with("role")->findOrFail($id));
    }

    public function update($id){
        $user = User::findOrFail($id);
        $updateData -> $request->only([
            "name",
            "lastname",
            "email",
            "password",
            "cellphone",
            "active",
            "role"
        ]);

        if (!empty($updateData["password"])){
            $updateData["password"] = Hash::make($updateData["password"]);
        }
        else{
            unset($updateData["password"]);
        }
        $user->update($updateData);
        return response()->json($user);
    }

    public function delete($id){
        $user = User::findorFail($id);
        $user->active = false;
        $user->save();
        return response()->json(["message" => "Usuario desactivado"]);
    }
}
