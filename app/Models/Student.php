<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'gender', 'id_teacher'
    ];
    public $timestamps = false;

    // relation with teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher', 'id_teacher');
    }
}
