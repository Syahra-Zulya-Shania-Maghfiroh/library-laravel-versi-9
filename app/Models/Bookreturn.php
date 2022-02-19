<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookreturn extends Model
{
    use HasFactory;
    protected $table = ('book_return');
    protected $primarykey = 'id_book_return';
    public $timestamps = true;
    protected $fillable = ['id_borrowing_book', 'dateOfReturn', 'fine'];
}
