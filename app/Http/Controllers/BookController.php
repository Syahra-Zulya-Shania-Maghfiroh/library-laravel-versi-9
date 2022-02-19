<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illumninate\Suppost\Facades\DB;

class BookController extends Controller
{
    
    public function show(){
        return book::all();
    }
    public function details($id_book){
        if(Book::where('id_book', $id_book)){
            $data_book=Book::select('book_name', 'author', 'description')->where('id_book', '=', $id_book)->get();
            return Response()->json($data_book);
        }
        else{
            return Response()->json(['message : not found']);
        }
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),
        [
            'book_name'=>'required',
            'author'=>'required',
            'description'=>'required'
        ]);
        if($validator->fails()) {
            return Response()->json($validator->error());
        }
        $save=Book::create([
            'book_name'=>$request->book_name,
            'author'=>$request->author,
            'description'=>$request->description
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        if($save){
            return Response()->json(['status : create book success']);
        }
        else{
            return Response()->json(['status : create book failed']);
        }
    }
    public function update($id_book, Request $request){
        $validator=Validator::make($request->all(),[
            'book_name'=>'required',
            'author'=>'required',
            'description'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $update = Book::where('id_book', $id_book)->update([
            'book_name'=>$request->book_name,
            'author'=>$request->author,
            'description'=>$request->description
        ]);
        if($update){
            return Response()->json(['status update book success']);
        }
        else{
            return Response()->json(['status update book fails']);
        }
    }

    public function destroy($id_book){
        $delete = Book::where('id_book', $id_book)->delete();
        if($delete){
            return Response()->json(['status delete book success']);
        } else {
            return Response()->json(['status delete book fails']);
        }
    }

}
