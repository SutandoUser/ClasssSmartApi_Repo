<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GroupController extends Controller
{
    public function readAll(){
        return response()->json(Group::with("owner","students")->get());
    }

    public function create(Request $request){
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

    public function update(Request $request, $id){
        $group = Group::findorFail($id);
        $group->update($request()->only([
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


    //Aqui empieza el desmadre de Web

    // Listar grupos del profesor
    public function index()
    {
        $teacher = Auth::user();

        // Los grupos donde el Usuario(el teacher) es el owner
        $groups = Group::where('owner', $teacher->id)->get();

        return view('teacher.groups', compact('groups'));
    }

    
    // Mostrar un grupo en detalle
    public function show($groupId)
    {
        $group = Group::with('students')->findOrFail($groupId);

        if ($group->owner != Auth::id()) {
            abort(403, "Este grupo no es tuyo papu");
        }

        return view('teacher.group-detail', compact('group'));
    }

    //Crear Grupo
    public function webCreateGroup(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required"
        ]);

        Group::create([
            "owner" => Auth::id(),
            "name" => $request->name,
            "description" => $request->description,
            "active" => true
        ]);

        return redirect()->route("teacher.groups")->with(
            "succes", "Grupo Creado Correctamente"
        );
    }

    //Alumnos disponibles para agregar
    public function availableStudents($groupId){
        $group = Group::findOrFail($groupId);
        // Alumnos (role_id = 3) que NO tienen asignado este grupo
        $students = User::where('role_id', 3)->whereDoesntHave('studentGroups', function($q) use ($groupId){
                $q->where('group_id', $groupId);
            })->get();
        return response()->json($students);
    }

    //agregarAlumno a Grupo
    public function addStudents(Request $request, $groupId){
        $request->validate([
            'students' => 'required|array',
            'students.*' => 'exists:users,id'
        ]);
        $group = Group::findOrFail($groupId);

    // Agregar múltiples alumnos de un jalón
        $group->students()->attach($request->students);
        return redirect()->route('teacher.groups')->with(
            'success', 'Alumnos agregados correctamente'
        );
    }

    //ACTUALIZAR GRUPO
    public function webUpdateGroup(Request $request, $groupId){
        $group = Group::findOrFail($groupId);

        if ($group->owner != Auth::id()) {
            return response()->json(["error" => "Este grupo no es tuyo"], 403);
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $group->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'group' => $group
        ]);
    }

}
