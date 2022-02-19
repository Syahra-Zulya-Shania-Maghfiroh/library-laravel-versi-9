<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoanDetails extends Model
{
    use HasFactory;
    protected $table = ('book_loan_details');
    protected $primarykey = 'id_book_loan_details';
    public $timestamps = true;
    protected $fillable = ['id_borrowing_book', 'id_book', 'qty'];
}
