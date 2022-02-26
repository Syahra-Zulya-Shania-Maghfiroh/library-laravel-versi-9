<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [App\Http\Controllers\UserController::class, 'register']);
Route::post("/login", [App\Http\Controllers\UserController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function(){

    Route::group(['middleware' => ['api.superadmin']], function(){
        Route::delete("/book/{id_book}", [App\Http\Controllers\BookController::class, 'destroy']);
        Route::delete("/grade/{id_grade}", [App\Http\Controllers\GradeController::class, 'destroy']);
        Route::delete("/student/{id_student}", [App\Http\Controllers\StudentController::class, 'destroy']);
        Route::delete("/return/{id_book_return}", [App\Http\Controllers\ReturnBookController::class, 'destroy']);
        Route::delete("/borrow/{id_borrowing_book}", [App\Http\Controllers\BorrowingBookController::class, 'destroy']);
        
    });

    Route::group(['middleware' => ['api.superadmin']], function(){
        Route::post("/book", [App\Http\Controllers\BookController::class, 'store']);
        Route::post("/grade", [App\Http\Controllers\GradeController::class, 'store']);
        Route::post("/student", [App\Http\Controllers\StudentController::class, 'store']);
        Route::post("/return", [App\Http\Controllers\ReturnBookController::class, 'store']);
        Route::post("/borrow", [App\Http\Controllers\BorrowingBookController::class, 'store']);

        Route::put("/book/{id_book}", [App\Http\Controllers\BookController::class, 'update']);
        Route::put("/grade/{id_grade}", [App\Http\Controllers\GradeController::class, 'update']);
        Route::put("/student/{id_student}", [App\Http\Controllers\StudentController::class, 'update']);
        Route::put("/return/{id_book_return}", [App\Http\Controllers\ReturnBookController::class, 'update']);
        Route::put("/borrow/{id_borrowing_book}", [App\Http\Controllers\BorrowingBookController::class, 'update']);

        Route::post('add/{id_borrowing_book}', [App\Http\Controllers\BorrowingBookController::class, 'addBook']);
    });

});
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get("/book", [App\Http\Controllers\BookController::class, 'show']);
    Route::get("/grade/{id_grade}", [App\Http\Controllers\GradeController::class, 'show']);
    Route::get("/student/{id_student}", [App\Http\Controllers\StudentController::class, 'show']);
    Route::get("/return/{id_book_return}", [App\Http\Controllers\ReturnBookController::class, 'show']);
    Route::get("/borrow/{id_borrowing_book}", [App\Http\Controllers\BorrowingBookController::class, 'show']);
});
