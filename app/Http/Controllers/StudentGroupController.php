<?php

namespace App\Http\Controllers;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGroupController extends Controller
{
    public function readAll(){
        return response()->json(StudentGroup::with("student","group")->get());
    }

    public function create(Request $request){
        $data = request()->validate([
            "student_id" => "required|exists:users,id",
            "group_id" => "required|exists:groups,id"
        ]);
        $studentGroup = StudentGroup::create($data);
        return response()->json($studentGroup);
    }

    public function readOne($id){
        return response()->json(StudentGroup::with("student","group")->findorFail($id));
    }

    public function update(Request $request, $id){
        $studentGroup = StudentGroup::findorFail($id);
        $studentGroup->update(request()->only([
            "student_id",
            "group_id"
        ]));
        return response()->json($studentGroup);
    }


    // Listar los grupos del estudiante
    public function index()
    {
        $student = Auth::user();

        // Los grupos donde el estudiante está inscrito
        $groups = $student->studentGroups()->with('owner')->get();

        return view('student.groups', compact('groups'));
    }

    // Mostrar detalle de un grupo específico
    public function show($groupId)
    {
        $group = Group::with('students', 'owner')->findOrFail($groupId);

        // Validar que el estudiante pertenezca al grupo
        if (!$group->students->contains(Auth::id())) {
            abort(403, "No perteneces a este grupo.");
        }

        return view('student.group-detail', compact('group'));
    }


}
