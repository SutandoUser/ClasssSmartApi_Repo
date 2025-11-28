<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    public function readAll(){
        return response()->json(Role::with("users")->get());
    }

    public function create(Request $request){
        $data = $request->validate([
            "description" => "required|string"
        ]);
        $role = Role::create($data);
        return response()->json($role);
    }
    public function readOne($id){
        return response()->json(Role::with("users")->findOrFail($id));
    }

    public function update(Request $request, $id){
        $role = SRole::findorFail($id);
        $role->update(request()->only([
            "description"
        ]));
        return response()->json($role);
    }

}
