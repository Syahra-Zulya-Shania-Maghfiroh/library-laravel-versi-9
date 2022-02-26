<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illumninate\Suppost\Facades\DB;

class GradeController extends Controller
{
   
    public function show()
    {
        return Grade::all();
    }
    public function details($id){
        if(Grade::where('id_grade',$id)->first()){
            $data_grade= Grade::select('grade_name', 'group')->where('id_grade', '=', $id)->get();
            return Response()->json($data_grade);
        }
        else{
            return Response()->json(['message : not found']);
        }
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),
            [
                'grade_name'=>'required',
                'group' => 'required'
            ]
            );
            if($validator->fails()) {
                return Response()->json($validator->errors());
            }
            $save = Grade::create([
                'grade_name' => $request->grade_name,
                'group' => $request->group
            ]);

            if($save){
                return Response()->json(['status : create success']);
            }
            else {
                return Response()->json(['status : create failed']);
            }
    }
    public function update($id, Request $request){
        $validator=Validator::make($request->all(),[
            'grade_name' => 'required',
            'group' => 'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $update = Grade::where('id_grade', $id)->update([
            'grade_name' => $request->grade_name,
            'group' => $request->group
        ]);
        if($update){
            return Response()->json(['status update grade success']);
        }
        else{
            return Response()->json(['status update grade fail']);
        }
    }
    public function destroy($id){
        $delete = Grade::where('id_grade', $id)->delete();
        if($delete) {
            return Response()->json(['status delete success']);
        }
        else{
            return Response()->json(['status delet fail']);
        }
    }
 
}
