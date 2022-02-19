<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $primarykey = 'id_book';
    public $fillable = ['book_name', 'author', 'description'];
    public $timestamps = true;
}
