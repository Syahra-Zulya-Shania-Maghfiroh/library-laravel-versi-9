<?php

namespace App\Http\Controllers;

use App\Models\BookLoanDeatils;
use Illuminate\Http\Request;

class BookLoanDetailController extends Controller
{
    
    public function show(){
        $data = DB::table('book_loan_details')
        ->join('borrowing_book', 'book_loan_details.id_borrowing_book', '=', 'borrowing_book.id_borrowing_book')
        ->join('book', 'book_loan_details.id_book' , '=', 'book.id_book')
        ->select('book_loan_details.id_book_loan_details', 'borrowing_book.id_borrowing_book', 'book.id_book', 'book_loan_details.qty')
        ->get();
        
        return Response()->json($data);
    }
    public function details($id_details){
        if(BookLoanDetails::where('id_book_loan_details', $id_details)->exists()){
            $data_details = BookLoanDetails::where('book_loan_details.id_book_loan_details', '=', $id_details)
            ->get();
            return Response()->json($data_details); 
        }
        else{
            return Response()->json(['message not found']);
        }
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'id_borrowing_book'=>'required',
            'id_book'=>'required',
            'qty'=>'required'
    ]);
    if($validator->fails()){
        return Response()->json($validator->error());
    }

    $save=BookLoanDetails::create([
        'id_borrowing_book'=>$request->id_borrowing_book,
        'id_book'=>$request->id_book,
        'qty'=>$request->id_book
    ]);
    if($save){
        return Response()->json(['status : create book loan detail success']);
    }
    else{
        return Response()->json(['status : create book loan detail failed']);
    }
    }

    public function update($id_details, Request $request){
        $validator=Validator::make($request->all(),[
            'id_borrowing_book' => 'required',
            'id_book' => 'required',
            'qty' => 'required'
        ]);
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }
        $update = BookLoanDetails::where('id_book_loan_details', $id_details)->update([
            'id_borrowing_book' => $request->id_borrowing_book,
            'id_book' => $request->id_book,
            'qty' => $request->qty
        ]);
        if($update) {
            return Response()->json(['status : update details success']);
        } else {
            return Response()->json(['status : update details fails']);
        }
    }
    public function destroy($id_details){
        $delete = BookLoanDetails::where('id_book_loan_details', $id_details)->delete();
        if($delete){
            return Response()->json(['status delete details success']);
        }
        else{
            return Response()->json(['status delete details fails']);
        }
    }
        

}
