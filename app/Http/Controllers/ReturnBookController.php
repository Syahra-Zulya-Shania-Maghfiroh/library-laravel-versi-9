<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnBookController extends Controller
{
    
    public function show(){
        return Bookreturn::join('borrowing_book', 'borrowing_book.id_borrowing_book', 'book_return.id_book_return')->get();
        return Response()->json($data_return);
    }
    public function details($id_book_return){
        if(DB::table('book_return')->where('id_book_return',$id_book_return)->exists()){
            $data_return = DB::table('book_return')
            ->join('book_return', 'book_return.id_borrowing_book', '=', 'borrowing_book.id_borrowing_book')
            ->select('book_return.id_book_return', 'book_return.dateOfReturn', 'book_return.fine')
            ->where('id_book_return', '=', $id_book_return)
            ->get();

        return Response()->json($data_return);
        }
        else{
            return Response()->json(['message' => 'not found']);
        }
    }
    // public function details(){
    //     if(Bookreturn::where('id_book_return', $id_book_return)->exists()){
    //         $data_return = Bookreturn::where('return_book.id_bookreturn', '=', $id_book_return)
    //         ->get();
    //         return Response()->json($data_return);
    //     } else{
    //         return Response()->json(['message data tidak ditemukan']);
    //     }
    // }
    public function store(Request $request){
        $validator=Validator::make($request->all(),
        [
            'id_borrowing_book'=>'required',
            'dateOfReturn'=>'required',
            'fine'=>'required'
        ]);
        if($validator->fails()) {
            return Response()->json($validator->error());
        }
        $save=Bookreturn::create([
            'id_borrowing_book'=>$request->id_borrowing_book,
            'dateOfReturn'=>$request->dateOfReturn,
            'fine'=>$request->fine
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        if($save){
            return Response()->json(['status : create return book success']);
        }
        else{
            return Response()->json(['status : create return book failed']);
        }
    }

    public function update($id_book_return, Request $request){
        $validator=Validator::make($request->all(),
        [
            'id_borrowing_book'=>'required',
            'dateOfReturn'=>'required',
            'fine'=>'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $update=Bookreturn::where('id_book_return', $id_book_return)->update([
            'id_borrowing_book'=>$request->id_borrowing_book,
            'dateOfReturn'=>$request->dateOfReturn,
            'fine'=>$request->fine
        ]);
        if($update){
            return Response()->json(['status : update return book success']);
        } else{
            return Response()->json(['status : update return book fail']);
        }
    }
    public function destroy($id_book_return){
        $delete = Bookreturn::where('id_book_return', $id_book_return)->delete();
        if($delete){
            return Response()->json(['status delete return success']);
        }
        else{
            return Response()->json(['status delete return fails']);
        }
    }

}
