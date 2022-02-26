<?php

namespace App\Http\Controllers;

use App\Models\Bookreturn;
use App\Models\BorrowingBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ReturnBookController extends Controller
{
    
    public function show(){
        return Bookreturn::join('borrowing_book', 'borrowing_book.id_borrowing_book', 'book_return.id_book_return')->get();
        return Response()->json($data_return);
    }
    public function details($id_book_return){
        if(DB::table('book_return')->where('id_book_return',$id_book_return)->exists()){
            $data_return = DB::table('book_return')
            ->select('book_return.*')
            ->join('borrowing_book', 'borrowing_book.id_borrowing_book', '=', 'book_return.id_borrowing_book')
            // ->select('book_return.id_book_return', 'book_return.dateOfReturn', 'book_return.fine')
            ->where('id_book_return', '=', $id_book_return)
            ->get();

        return Response()->json($data_return);
        }
        else{
            return Response()->json(['message' => 'not found']);
        }
    }
  
    public function store(Request $request){
        $validator=Validator::make($request->all(),
        [
            'id_borrowing_book'=>'required',
            // 'dateOfReturn'=>'required',
            // 'fine'=>'required'
        ]);
        if($validator->fails()) {
            return Response()->json($validator->error());
        } 

        $check = Bookreturn::where('id_borrowing_book', $request->id_borrowing_book);
            if($check->count() == 0){
                $data_return = BorrowingBook::where('id_borrowing_book', $request->id_borrowing_book)->first();
                $now = Carbon::now()->format('Y-m-d');
                $return_date = new Carbon($data_return->return_date);
                $fineTOday = 1000;
                if(strtotime($now) > strtotime($return_date)){
                    $dayTotal = $return_date->diff($now)->days;
                    $fine = $dayTotal*$fineTOday;
                } else {
                    $fine = 0;
                }
            }
        $save=Bookreturn::create([
            'id_borrowing_book'=>$request->id_borrowing_book,
            'dateOfReturn'=>$now,
            'fine'=>$fine
        ]);
        if($save){
            $data['status'] = 1;
            $data['message'] = 'Berhasil dikembalikan';
        } else {
            $data['status'] = 0;
            $data['message'] = 'Pengembalian gagal';
        }
    // } else {
    //     $data = ['status'=>0,'message'=>'Sudah pernah dikembalikan'];
    // }
    return response()->json($data);

        // if($save){
        //     return Response()->json(['status : return book success']);
        // }
        // else{
        //     return Response()->json(['status : return book failed']);
        // }
        
    // }else {
    //         $data_return = ['status : book already return'];
    //     } 
        // return Response()->json($data_return);
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
