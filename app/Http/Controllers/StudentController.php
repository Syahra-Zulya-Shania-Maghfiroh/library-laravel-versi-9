<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function show(){
        return Student::join('grade', 'grade.id_grade','student.id_student')->get();
        return Response()->json($data_student);
    }
    public function details($id){
        if(Student::where('id_grade', $id)->exists()){
            $data_student = Student::join('grade', 'grade.id_grade', 'student.id_grade')
                                            ->where('student.id_grade', '=', $id)
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
            return Response()->json($validator->error());
        }

        $save=Student::create([
            'id_grade'=>$request->id,
            'student_name'=>$request->student_name,
            'born'=>$request->born,
            'gender'=>$request->gender,
            'address'=>$request->address
        ]);
        if($save){
            return Response()->json(['status create student success']);
        }
        else{
            return Response()->json(['status create student failed']);
        }
    }
    public function update($id_student, Request $request){
        $validator=Validator::make($request->all(),
        [
            'student_name' => 'required',
            'born' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'id' => 'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $update = student::where('id_student', $id_student)->update([
            'student_name' => $request->student_name,
            'born' => $request->born,
            'gender' => $request->gender,
            'address' => $request->address,
            'id' => $request->id
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
