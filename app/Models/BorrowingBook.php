<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowingBook extends Model
{
    use HasFactory;
    protected $table = ('borrowing_book');
    protected $primarykey = 'id_borrowing_book';
    public $timestamps = true;
    protected $fillable = ['id_student', 'borrow_date', 'return_date'];
}
