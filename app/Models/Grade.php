<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grade';
    protected $primarykey = 'id_grade';
    public $timestamps = true;
    protected $fillable = ['grade_name', 'group'];
}
