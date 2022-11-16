<?php

namespace App\Http\Controllers;

use App\Models\Student as ModelsStudent;
use Illuminate\Http\Request;

class Student extends Controller
{
    public function index(){
        $students = ModelsStudent::all();
        $data = [
            "message" => "Get All Students",
            "data" => $students
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request){
        $student = new ModelsStudent;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->nim = $request->nim;
        $student->jurusan = $request->jurusan;
        $student->save();

        $data = [
            "message" => "Student Created",
            "data" => $student
        ];

        return response()->json($data, 201);
    }
}
