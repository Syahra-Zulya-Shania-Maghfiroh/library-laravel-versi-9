<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primarykey = 'id_student';
    public $timestamps = true;
    protected $fillable = ['id_grade', 'student_name', 'born', 'gender', 'address'];
}
