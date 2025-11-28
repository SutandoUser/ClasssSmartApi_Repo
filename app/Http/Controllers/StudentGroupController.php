<?php

namespace App\Http\Controllers;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

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

    public function update($id){
        $studentGroup = StudentGroup::findorFail($id);
        $studentGroup->update(request()->only([
            "student_id",
            "group_id"
        ]));
        return response()->json($studentGroup);
    }
}
