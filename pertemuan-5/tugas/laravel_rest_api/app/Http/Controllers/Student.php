<?php

namespace App\Http\Controllers;

use App\Models\Student as ModelsStudent;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

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
        //Validate Request
        $validate = FacadesValidator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'nim' => 'required|size:10|unique:students',
            'jurusan' => 'required'
        ]);

        if($validate->fails()){
            $data = [
                "message" => $validate->errors()
            ];

            return response()->json($data, 400);
        }else{
            $student = new ModelsStudent;
    
            $student::create($request->all());
    
            $data = [
                "message" => "Student Created",
                "data" => $request->all()
            ];
    
            return response()->json($data, 201);
        }
    }

    public function show($id){
        $student = ModelsStudent::find($id);
        $data = [
            "message" => "Get Student Detail",
            "data" => $student
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id){
        //Validate Request
        $validate = FacadesValidator::make($request->all(),[
            'email' => 'email|unique:students,email,'.$id,
            'nim' => 'size:10|unique:students,nim,'.$id,
        ]);

        if ($validate->fails()) {
            $data = [
                "message" => $validate->errors()
            ];
            
            return response()->json($data, 400);
        }else{
            $student = new ModelsStudent();
    
            $student->find($id)->update($request->all());
    
            $data = [
                "message" => "Student Updated"
            ];
    
            return response()->json($data, 200);
        }

    }

    public function destroy($id){
        $student = ModelsStudent::find($id);
        $student->delete();

        $data = [
            "message" => "Student Deleted"
        ];

        return response()->json($data, 200);
    }
}
