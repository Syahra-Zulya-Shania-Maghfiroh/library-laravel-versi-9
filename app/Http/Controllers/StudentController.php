<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    
    public function show(){
        return Student::join('grade', 'grade.id_grade','student.id_student')->get();
        return Response()->json($data_student);
    }
    public function details($id_student){
        if(Student::where('id_student', $id_student)->exists()){
            $data_student = DB::table('student')
            ->select('student.*')
            ->where('student.id_student', '=', $id_student)
            ->get();
            return Response()->json($data_student);
        }
        else {
            return Response()->json(['message' => 'not found']);
        }
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),
        [
            'id_grade'=>'required',
            'student_name'=>'required',
            'born'=>'required',
            'gender'=>'required',
            'address'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $save=Student::create([
            'id_grade'=>$request->id_grade,
            'student_name'=>$request->student_name,
            'born'=>$request->born,
            'gender'=>$request->gender,
            'address'=>$request->address
        ]);
        // $data_student = Student::where('student_name', '=', $request->student_name)->get();
        if($save){
            return Response() -> json([
                'message' => 'Succes create student',
            ]);
        } else 
        {
            return Response() -> json([
                'message' => 'Failed create student'
            ]);
        }
    }

    public function update($id_student, Request $request){
        $validator=Validator::make($request->all(),
        [
            'student_name' => 'required',
            'born' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'id_grade' => 'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $update = student::where('id_student', $id_student)->update([
            'student_name' => $request->student_name,
            'born' => $request->born,
            'gender' => $request->gender,
            'address' => $request->address,
            'id_grade' => $request->id_grade
        ]);
        if($update){
            return Response()->json(['status update student success']);
        }
        else{
            return Response()->json(['status update student fail']);
        }
    }
    public function destroy($id_student){
        $delete=student::where('id_student', $id_student)->delete();
        if($delete) {
            return Response()->json(['status delete student success']);
        } else{
            return Response()->json(['status delete student fail']);
        }
    }

}
