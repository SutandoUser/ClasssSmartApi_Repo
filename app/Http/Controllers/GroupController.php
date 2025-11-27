<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function readAll(){
        return response()->json(Group::with("owner","students")->get());
    }

    public function create(){
        $data = request()->validate([
            "owner" => "required|exists:users,id",
            "name" => "required|min:3",
            "description"=> "nullable",
            "active" => "required|boolean"
        ]);
        $group = Group::create($data);
        return response()->json($group);
    }

    public function readOne($id){
        return response()->json(Group::with("owner", "students")->findorFail($id));
    }

    public function update($id){
        $group = Group::findorFail($id);
        $group->update(request()->only([
            "owner",
            "name",
            "description",
            "active"
        ]));
        return response()->json($group);
    }

    public function delete($id){
        $group = Group::findorFail($id);
        $group->active = false;
        $group->save();
        return response()->json(["message" => "Grupo desactivado"]);
    }
}
