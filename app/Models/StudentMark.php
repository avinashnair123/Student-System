<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student', 'term', 'maths', 'science', 'history'
    ];

    // relation with student
    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student', 'id_student');
    }
}
