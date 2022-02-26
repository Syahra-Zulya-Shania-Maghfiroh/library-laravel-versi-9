<?php

namespace App\Http\Controllers;

use App\Models\BorrowingBook;
use App\Models\BookLoanDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BorrowingBookController extends Controller
{
    
    public function show(){
        return BorrowingBook::join('book', 'book.id_book', 'borrowing_book.id_borrowing_book')->get();
        return Response()->json($data_borrow);
    }
    public function details($id_borrow){
        if(DB::table('borrowing_book')->where('id_borrowing_book', '=', $id_borrow)->exists()){
            $data_borrow = DB::table('borrowing_book')
            ->join('student', 'borrowing_book.id_student', '=', 'student.id_student')
            ->select('borrowing_book.id_borrowing_book', 'borrowing_book.borrow_date', 'borrowing_book.return_date', 'student.id_student')
            ->where('id_borrowing_book', '=', $id_borrow)
            ->get();
        return Response()->json($data_borrow);
        }
        else{
            return Response()->json(['message' => 'not found']);
        }
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),
        [
            'id_student'=>'required', 
            'borrow_date'=>'required', 
            'return_date' =>'required'
        ]);
        if($validator->fails()) {
            return Response()->json($validator->error());
        }
        $save=BorrowingBook::create([
            'id_student'=>$request->id_student,
            'borrow_date'=>$request->borrow_date,
            'return_date'=>$request->return_date
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        if($save){
            return Response()->json(['status : create borrowing book success']);
        }
        else{
            return Response()->json(['status : create borrowing book failed']);
        }
    }
    public function addBook(Request $request, $id_borrow){
        $validator = Validator::make($request->all(),[
            'id_book' => 'required',
            'qty' => 'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save = BookLoanDetails::create([
            'id_borrowing_book' => $id_borrow,
            'id_book' => $request->id_book,
            'qty' => $request->qty,
        ]);
        if($save){
            return Response()->json(['status success add item']);
        } else {
            return Response()->json(['status success add item']);
        }
    }
    public function update($id_borrow, Request $request){
        $validator=Validator::make($request->all(),
        [
            'id_student'=>'required', 
            'borrow_date'=>'required', 
            'return_date' =>'required'
        ]);
       
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        
        $update=BorrowingBook::where('id_borrowing_book', $id_borrow)->update([
            'id_student'=>$request->id_student,
            'borrow_date'=>$request->borrow_date,
            'return_date'=>$request->return_date
        ]);
        if($update){
            return Response()->json(['status : update borrowing book success']);
        }
        else{
            return Response()->json(['status : update borrowing book failed']);
        }
    }
    public function destroy($id_borrow){
        $delete = BorrowingBook::where('id_borrowing_book', $id_borrow)->delete();
        if($delete){
            return Response()->json(['status delete borrowing book success']);
        } else {
            return Response()->json(['status delete borrowing book fails']);
        }
    }

}
